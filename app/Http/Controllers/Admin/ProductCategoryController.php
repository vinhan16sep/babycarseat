<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCategoryMapping;
use App\Models\Type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $list = ProductCategory::with(['type'])->orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/product-category/index', compact('list'));
    }

    public function create() {
        return view('admin/product-category/create', [
            'activedTypes' => $this->getActivedTypes()
        ]);
    }

    public function store(Request $request) {

        $this->validateStore($request);

        DB::beginTransaction();

        try {

            $model = new ProductCategory();
            $model->name = $request->input('name');
            $model->slug = $request->input('slug');
            $model->type_id = $request->input('type_id');
            $model->disp_name = $request->input('disp_name');
            $model->description = $request->input('description');
            if ($model->save()) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.PRODUCT_CATEGORY_IMAGE'), $model->id);
                $upload = $this->uploadImage($path, $request);
                $model->image = $upload;
        
                if ($model->save()) {
                    DB::commit();
                    return redirect()->route('list-product-category')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                }
                DB::rollBack();
                return redirect()->route('create-product-category')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
            }
            DB::rollBack();
            return redirect()->route('create-product-category')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-product-category')->with('error', $e->getMessage()); 
        }
    }

    public function edit($id) {

        $object = ProductCategory::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-product-category')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/product-category/edit', [
            'object' => $object,
            'activedTypes' => $this->getActivedTypes()
        ]);
    }

    public function update(Request $request, $id) {
        $object = ProductCategory::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-product-category')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {

            $object->name = $request->input('name');
            $object->slug = $request->input('slug');
            $object->type_id = $request->input('type_id');
            $object->disp_name = $request->input('disp_name');
            $object->description = $request->input('description');
                    
            if($request->hasfile('image')) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.PRODUCT_CATEGORY_IMAGE'), $id);
                $prevImg = $object->image;
                $upload = $this->updateImage($path, $request);;
                $object->image = $upload;
            }

            if ($object->save()) {
                DB::commit();
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }
                return redirect()->route('edit-product-category', ['id' => $id])->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-product-category', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-product-category', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', $e->getMessage()); 
        }
    }

    public function delete(Request $request) {
        $request = $request->all();

        DB::beginTransaction();

        try {

            // If got bad parameter(s)
            if (!isset($request['id']) || empty($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }

            $object = ProductCategory::find($request['id']);
            // If object not found
            if ($object == null || $object->count() == 0) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }

            // If object is being used elsewhere
            if ($this->isUsing($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DELETE_IN_USING')], 404);
            }

            $cateMappings = ProductCategoryMapping::where(['category_id' => $request['id']])->get()->toArray();
            if (count($cateMappings) == 0) {
                if ($object->delete()) {
                    DB::commit();
                    return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
                }
                DB::rollBack();
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);

            } else {
                $delCateMapping = ProductCategoryMapping::where(['category_id' => $request['id']])->delete();
                if ($delCateMapping == count($cateMappings)) {
                    if ($object->delete()) {
                        DB::commit();
                        return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
                    }
                    DB::rollBack();
                    return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
                }
                DB::rollBack();
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
            }
            DB::rollBack();
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);

        } catch (Exception $e) {
            return response()->json(['status' => 'error','msg' => $e->getMessage()], 403);
        }
    }

    private function validateStore($request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:product_categories',
            'type_id' => 'required',
            'disp_name' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'type_id.required' => 'Chưa chọn loại sản phẩm',
            'disp_name.required' => 'Chưa nhập tên hiển thị',
            'image.required' => 'Chưa chọn ảnh',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:product_categories,slug,' . $id . ',id',
            'type_id' => 'required',
            'disp_name' => 'required|max:255',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'type_id.required' => 'Chưa chọn loại sản phẩm',
            'disp_name.required' => 'Chưa nhập tên hiển thị',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
        ]);
    }

    private function isUsing($id) {
        // $count = ProductCategoryMapping::where(['category_id' => $id])->count();

        // if ($count == 0) {
        //     return false;
        // }
        // return true;

        return false;
    }

    protected function getActivedTypes() {
        return Type::where(['is_active' => '1'])->get();
    }
}
