<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductFile;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ProductFileController extends AdminController
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
        $list = ProductFile::with('product')->orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/product-file/index', compact('list'));
    }

    public function view($id)
    {
        $file = ProductFile::findOrFail($id);
        $path = storage_path('app/' . str_replace('storage/', 'public/', $file->file_path));

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        ]);
    }

    public function create() {
        $products = Product::get();
        return view('admin/product-file/create', [
            'products' => $products,
        ]);
    }

    public function store(Request $request) {

        $this->validateStore($request);

        DB::beginTransaction();

        try {
            $model = new ProductFile();

            $model->product_id = $request->input('product_id');
            $model->type = $request->input('type');
            $model->file_name = '';
            $model->file_path = '';
            $model->is_active = $request->input('is_active');
            if ($model->save()) {
                if($request->hasfile('file')) {
                    $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.PRODUCT_FILE'), $request->input('product_id'));
                    list($name, $fullPath) = $this->uploadFile($path, $request, 'file');
                    $model->file_name = $name;
                    $model->file_path = $fullPath;
                    if ($model->save()) {
                        DB::commit();
                        return redirect()->route('list-product-file')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                    }
                } else {
                    return redirect()->route('create-product-file')->with('error', Config::get('constants.MESSAGE.PRODUCT_FILE_REQUIRED'));
                }
            }
            return redirect()->route('create-product-file')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-product-file')->with('error', $e->getMessage()); 
        }
    }

    public function edit($id) {

        $object = ProductFile::find($id);
        $products = Product::get();

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-product-file')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/product-file/edit', [
            'object' => $object,
            'products' => $products,
            'callback' => url(URL::previous())
        ]);
    }

    public function update(Request $request, $id) {
        $object = ProductFile::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-product-file')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {

            $object->label = $request->input('label');
            $object->title = $request->input('title');
            $object->sub_title = $request->input('sub_title');
            $object->slug = $request->input('slug');
            $object->sort_content = $request->input('sort_content');
            $object->content = $request->input('content');
            $object->is_active = $request->input('is_active');
            $object->updated_by = 1;
                
            if($request->hasfile('image')) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.PRODUCT_FILE'), $id);
                $prevImg = $object->image;
                $upload = $this->updateImage($path, $request);
                $object->image = $upload;
            }

            if ($object->save()) {
                DB::commit();

                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }

                return redirect()->route('list-product-file', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-product-file', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-product-file', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', $e->getMessage()); 
        }
    }

    public function delete(Request $request) {
        $request = $request->all();


        try {

            // If got bad parameter(s)
            if (!isset($request['id']) || empty($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }
    
            $object = ProductFile::find($request['id']);
            // If object not found
            if ($object == null || $object->count() == 0) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }
    
            // If object is being used elsewhere
            if ($this->isUsing($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DELETE_IN_USING')], 404);
            }
    
            DB::beginTransaction();

            if ($object->delete()) {
                
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.PRODUCT_FILE'), $object->product_id);
                $delImageStt = $this->deleteFile($path . $object->file_name);
                if ($delImageStt) {
                    DB::commit();
                    return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
                } else {
                    DB::rollBack();
                    return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
                }
            }
            DB::rollBack();
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-product-file')->with('error', $e->getMessage()); 
        }
    }

    public function changeStatus(Request $request) {
        
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id']) || !isset($request['status']) || ($request['status'] != '0' && $request['status'] != '1')) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $object = ProductFile::find($request['id']);
        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }
        
        // If object is being used elsewhere
        if ($request['status'] == '0') {
            if ($this->isUsing($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.CANNOT_DEACTIVE_IN_USING')], 200);
            }
        }

        $object->is_active = $request['status'];

        if ($object->save()) {
            return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.CHANGE_STATUS_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 200);
    }

    private function validateStore($request) {
        $this->validate($request, [
            'product_id' => 'required|integer',
            'type'       => 'required|in:1,2',
            'file'       => 'required|mimes:pdf|max:10240', // 10MB max
        ], [
            'product_id.required' => 'Vui lòng chọn sản phẩm.',
            'type.required' => 'Vui lòng chọn loại file.',
            'file.required' => 'Vui lòng chọn file.',
            'file.mimes'    => 'Chỉ được upload file PDF.',
            'file.max'      => 'Dung lượng file không vượt quá 10MB.',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'product_id' => 'required',
            'label' => 'required',
            'slug' => 'required|max:255|unique:product-file,slug,' . $id . ',id',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'title.required' => 'Chưa nhập tiêu đề',
            'product_id.required' => 'Chưa chọn sản phẩm',
            'label.required' => 'Chưa chọn vị trí',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
        ]);
    }

    private function isUsing($id) {
        return false;
    }
}
