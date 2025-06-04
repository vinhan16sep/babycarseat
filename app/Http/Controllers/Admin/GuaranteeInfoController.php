<?php

namespace App\Http\Controllers\Admin;

use App\Models\GuaranteeInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GuaranteeInfoController extends AdminController
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
        $list = GuaranteeInfo::orderBy('id', 'asc')->get();
        return view('admin/guarantee-info/index', compact('list'));
    }

    public function edit($id) {

        $object = GuaranteeInfo::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-guarantee-info')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/guarantee-info/edit', [
            'object' => $object,
        ]);
    }

    public function update(Request $request, $id) {
        $object = GuaranteeInfo::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-guarantee-info')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        $object->title = $request->input('title');
        $object->content = $request->input('content');

        if ($object->save()) {
            return redirect()->route('edit-guarantee-info', ['id' => $id])->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
        }
        return redirect()->route('edit-guarantee-info', ['id' => $id])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [

        ], [

        ]);
    }

    private function isUsing($id) {
        return false;
    }
}
