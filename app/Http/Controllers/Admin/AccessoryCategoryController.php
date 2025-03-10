<?php

namespace App\Http\Controllers\Admin;

use App\Models\Accessory;
use App\Models\AccessoryCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class AccessoryCategoryController extends AdminController
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
        $list = AccessoryCategory::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/accessory-category/index', compact('list'));
    }

    public function create() {
        return view('admin/accessory-category/create');
    }

    public function store(Request $request) {

        $this->validateStore($request);

        DB::beginTransaction();

        try {

            $model = new AccessoryCategory();
            $model->name = $request->input('name');
            $model->slug = $request->input('slug');
            $model->description = $request->input('description');
            $model->is_active = $request->input('is_active');
            $model->created_by = 1;
            $model->updated_by = 1;
            if ($model->save()) {

                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.ACCESSORY_CATEGORY_IMAGE'), $model->id);
                $upload = $this->uploadImage($path, $request);
                $model->image = $upload;
            
                if ($model->save()) {
                    DB::commit();
                    return redirect()->route('list-accessory-category')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                }
                DB::rollBack();
                return redirect()->route('create-accessory-category')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

            }
            return redirect()->route('create-accessory-category')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-accessory-category')->with('error', $e->getMessage()); 
        }
    }

    public function edit($id) {

        $object = AccessoryCategory::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-accessory-category')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/accessory-category/edit', [
            'object' => $object,
        ]);
    }

    public function update(Request $request, $id) {
        $object = AccessoryCategory::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-accessory-category')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {

            $object->name = $request->input('name');
            $object->slug = $request->input('slug');
            $object->description = $request->input('description');
            $object->is_active = $request->input('is_active');
            $object->updated_by = 1;
                    
            if($request->hasfile('image')) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.ACCESSORY_CATEGORY_IMAGE'), $id);
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
                return redirect()->route('edit-accessory-category', ['id' => $id])->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-accessory-category', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-accessory-category', [
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

            $object = AccessoryCategory::find($request['id']);
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
                    
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.ACCESSORY_CATEGORY_IMAGE'), $request['id']);
                $delImageStt = $this->deleteImage($path);
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
            return redirect()->route('create-news')->with('error', $e->getMessage()); 
        }
    }

    public function changeStatus(Request $request) {
        
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id']) || !isset($request['status']) || ($request['status'] != '0' && $request['status'] != '1')) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $object = AccessoryCategory::find($request['id']);
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
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:accessory_category',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:accessory_category,slug,' . $id . ',id',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
        ]);
    }

    private function isUsing($id) {
        $accessoryCnt = Accessory::where(['accessory_category_id' => $id])->count();

        if ($accessoryCnt == 0) {
            return false;
        }
        return true;
    }
}
