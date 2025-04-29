<?php

namespace App\Http\Controllers\Admin;

use App\Models\Note;
use App\Models\ProductNote;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class NoteController extends AdminController
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
        $list = Note::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/note/index', compact('list'));
    }

    public function create() {
        return view('admin/note/create');
    }

    public function store(Request $request) {
        $this->validateStore($request);

        DB::beginTransaction();

        $model = new Note();
        $model->name = $request->input('name');

        if ($model->save()) {
            $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.NOTE_IMAGE'), $model->id);
            $upload = $this->uploadImage($path, $request);
            $model->image = $upload;
    
            if ($model->save()) {
                DB::commit();
                return redirect()->route('list-note')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('create-note')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
            
        }
        return redirect()->route('create-note')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
    }

    public function edit($id) {

        $object = Note::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-note')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/note/edit', [
            'object' => $object,
        ]);
    }

    public function update(Request $request, $id) {
        $object = Note::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-note')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {

            $object->name = $request->input('name');
                    
            if($request->hasfile('image')) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.NOTE_IMAGE'), $id);
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

                return redirect()->route('list-note', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-note', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-note', [
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

        $object = Note::find($request['id']);
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
        ], [
            'name.required' => 'Chưa nhập tên',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ], [
            'name.required' => 'Chưa nhập tên',
        ]);
    }

    private function isUsing($id) {
        $count = ProductNote::where(['note_id' => $id])->count();

        if ($count == 0) {
            return false;
        }
        return true;
    }
}
