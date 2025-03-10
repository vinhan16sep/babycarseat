<?php

namespace App\Http\Controllers\Admin;

use App\Models\Accessory;
use App\Models\AccessoryCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class AccessoryController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function index(Request $request) {

        $req = $request->all();

        $q = Accessory::with(['category']);

        // Tên phụ kiện
        if (isset($req['name']) && $req['name']) {
            $q->where('name', 'LIKE', '%' . $req['name'] . '%');
        }

        // Danh mục
        if (isset($req['category']) && $req['category']) {
            $q->where('accessory_category_id', $req['category']);
        }

        // Sản phẩm mới
        if (isset($req['is_new']) && $req['is_new'] == '1') {
            $q->where('is_new', 1);
        } else if (isset($req['is_new']) && $req['is_new'] == '0') {
            $q->where('is_new', 0);
        }

        // Sản phẩm nổi bật
        if (isset($req['is_highlight']) && $req['is_highlight'] == '1') {
            $q->where('is_highlight', 1);
        } else if (isset($req['is_highlight']) && $req['is_highlight'] == '0') {
            $q->where('is_highlight', 0);
        }

        // Kích hoạt
        if (isset($req['is_active']) && $req['is_active'] == '1') {
            $q->where('is_active', 1);
        } else if (isset($req['is_active']) && $req['is_active'] == '0') {
            $q->where('is_active', 0);
        }

        $list = $q->orderBy('id', 'desc')->paginate(10)->withQueryString();
        return view('admin/accessory/index', [
            'list' => $list,
            'req' => $req,
            'activedCategories' => $this->getActivedCategories()
        ]);
    }

    public function create() {
        return view('admin/accessory/create', [
            'activedCategories' => $this->getActivedCategories()
        ]);
    }

    public function store(Request $request) {

        $this->validateStore($request);

        DB::beginTransaction();

        try {
            $model = new Accessory();
            $model->accessory_category_id = $request->input('accessory_category_id');
            $model->name = $request->input('name');
            $model->slug = $request->input('slug');
            $model->description = $request->input('description');
            $model->content = $request->input('content');
            $model->price = $request->input('price');
            $model->is_active = $request->input('is_active');
            $model->is_new = $request->input('is_new');
            $model->is_highlight = $request->input('is_highlight');
            $model->created_by = 1;
            $model->updated_by = 1;
            if ($model->save()) {
                
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.ACCESSORY_IMAGE'), $model->id);
                $upload = $this->uploadImage($path, $request);
                $model->image = $upload;
                $model->save();
    
                if ($model->save()) {
                    DB::commit();
                    return redirect()->route('list-accessory')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                }
            }
            DB::rollBack();
            return redirect()->route('create-accessory')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-accessory')->with('error', $e->getMessage()); 
        }
    }

    public function edit($id) {
        $object = Accessory::find($id);
        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-accessory')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/accessory/edit', [
            'object' => $object,
            'activedCategories' => $this->getActivedCategories(),
            'callback' => url(URL::previous())
        ]);
    }

    public function update(Request $request, $id) {
        $object = Accessory::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-accessory')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {
            $object->accessory_category_id = $request->input('accessory_category_id');
            $object->name = $request->input('name');
            $object->slug = $request->input('slug');
            $object->description = $request->input('description');
            $object->content = $request->input('content');
            $object->price = $request->input('price');
            $object->is_active = $request->input('is_active');
            $object->is_new = $request->input('is_new');
            $object->is_highlight = $request->input('is_highlight');
            $object->created_by = 1;
            $object->updated_by = 1;
                
            if($request->hasfile('image')) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.ACCESSORY_IMAGE'), $id);
                $prevImg = $object->image;
                $upload = $this->updateImage($path, $request, $prevImg);
                $object->image = $upload;
            }

            if ($object->save()) {
                DB::commit();
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }

                return redirect()->route('list-accessory', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-accessory', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-accessory', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', $e->getMessage()); 
        }
    }

    public function delete(Request $request) {
        $request = $request->all();

        // If got bad parameter(s)
        if (!isset($request['id']) || empty($request['id'])) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Accessory::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        // If object is being used elsewhere
        if ($this->checkInUse($request['id'])) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DELETE_IN_USING')], 404);
        }

        if ($object->delete()) {
            return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }

    public function changeStatus(Request $request) {
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id']) || !isset($request['status']) || ($request['status'] != '0' && $request['status'] != '1')) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Accessory::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }
        
        // If object is being used elsewhere
        if ($request['status'] == '0') {
            if ($this->checkInUse($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DEACTIVE_IN_USING')], 404);
            }
        }

        $object->is_active = $request['status'];

        if ($object->save()) {
            return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.CHANGE_STATUS_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }
    
    private function validateStore($request) {
        $this->validate($request, [
            'accessory_category_id' => 'required',
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:accessories',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric',
        ], [
            'accessory_category_id.required' => 'Chưa chọn danh mục',
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'image.required' => 'Chưa chọn ảnh',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
            'price.required' => 'Chưa chọn đơn giá',
            'price.numeric' => 'Đơn giá phải là số',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'accessory_category_id' => 'required',
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:accessories,slug,' . $id . ',id',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric',
        ], [
            'accessory_category_id.required' => 'Chưa chọn danh mục',
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
            'price.required' => 'Chưa chọn đơn giá',
            'price.numeric' => 'Đơn giá phải là số',
        ]);
    }

    private function checkInUse($id) {
        return false;
    }

    private function getActivedCategories() {
        return AccessoryCategory::where(['is_active' => '1'])->get();
    }
}
