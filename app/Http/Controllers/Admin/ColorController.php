<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Models\ProductColor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ColorController extends AdminController
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
        $list = Color::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/color/index', compact('list'));
    }

    public function create() {
        return view('admin/color/create');
    }

    public function store(Request $request) {
        $this->validateStore($request);

        $model = new Color();
        $model->name = $request->input('name');
        $model->code = $request->input('code');
        if ($model->save()) {
            return redirect()->route('list-color')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
        }
        return redirect()->route('create-color')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
    }

    public function edit($id) {

        $object = Color::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-color')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/color/edit', [
            'object' => $object,
        ]);
    }

    public function update(Request $request, $id) {
        $object = Color::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-color')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        $object->name = $request->input('name');
        $object->code = $request->input('code');

        if ($object->save()) {
            return redirect()->route('edit-color', ['id' => $id])->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
        }
        return redirect()->route('edit-color', ['id' => $id])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
    }

    public function delete(Request $request) {
        $request = $request->all();

        // If got bad parameter(s)
        if (!isset($request['id']) || empty($request['id'])) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Color::find($request['id']);
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

    private function validateStore($request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'code' => 'required|max:255',
        ], [
            'name.required' => 'Chưa nhập tên',
            'code.required' => 'Chưa nhập code',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'code' => 'required|max:255',
        ], [
            'name.required' => 'Chưa nhập tên',
            'code.required' => 'Chưa nhập code',
        ]);
    }

    private function isUsing($id) {
        $count = ProductColor::where(['color_id' => $id])->count();

        if ($count == 0) {
            return false;
        }
        return true;
    }
}
