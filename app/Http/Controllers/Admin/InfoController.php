<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\Product;
use App\Models\Region;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class InfoController extends AdminController
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
        $list = Country::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/country/index', compact('list'));
    }

    public function create() {
        return view('admin/country/create');
    }

    public function store(Request $request) {
        $this->validateStore($request);

        $model = new Country();
        $model->name = $request->input('name');
        $model->slug = $request->input('slug');
        $model->description = $request->input('description');
        $model->is_active = $request->input('is_active');
        $model->created_by = 1;
        $model->updated_by = 1;
        if ($model->save()) {
            return redirect()->route('list-country')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
        }
        return redirect()->route('create-country')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
    }

    public function edit($id) {

        $object = Country::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-country')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/country/edit', [
            'object' => $object,
        ]);
    }

    public function update(Request $request, $id) {
        $object = Country::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-country')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        $object->name = $request->input('name');
        $object->slug = $request->input('slug');
        $object->description = $request->input('description');
        $object->is_active = $request->input('is_active');
        $object->updated_by = 1;

        if ($object->save()) {
            return redirect()->route('edit-country', ['id' => $id])->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
        }
        return redirect()->route('edit-country', ['id' => $id])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
    }

    public function delete(Request $request) {
        $request = $request->all();

        // If got bad parameter(s)
        if (!isset($request['id']) || empty($request['id'])) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Country::find($request['id']);
        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        // If object is being used elsewhere
        if ($this->isUsing($request['id'])) {
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
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $object = Country::find($request['id']);
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
            'slug' => 'required|max:255|unique:countries',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:countries,slug,' . $id . ',id',
        ], [
            'name.required' => 'Chưa nhập tên',
            'slug.required' => 'Chưa có slug',
            'slug.unique' => 'Slug đã tồn tại',
        ]);
    }

    private function isUsing($id) {
        $regionCnt = Region::where(['country_id' => $id])->count();
        $productCnt = Product::where(['country_id' => $id])->count();

        if ($regionCnt == 0 && $productCnt == 0) {
            return false;
        }
        return true;
    }
}
