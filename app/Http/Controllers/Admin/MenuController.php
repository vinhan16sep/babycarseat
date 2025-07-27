<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class MenuController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $req = $request->all();

        $menus = Menu::orderBy('position', 'asc')->orderBy('sort', 'asc')->paginate(99)->withQueryString();
        return view('admin/menu/index', [
            'menus' => $menus,
            'footerMenuPosition' => Config::get('constants.FOOTER_MENU_POSITION'),
            'req' => $req,
        ]);
    }

    public function create()
    {
        return view('admin/menu/create', [
            'footerMenuPosition' => Config::get('constants.FOOTER_MENU_POSITION'),
        ]);
    }

    public function store(Request $request)
    {
        $this->validateStore($request);

        DB::beginTransaction();

        try {
            $model = new Menu();
            $model->location = Config::get('constants.MENU_LOCATION.FOOTER');
            $model->position = $request->input('position');
            $model->title = $request->input('title');
            $model->link = $request->input('link');
            $model->is_active = $request->input('is_active');
            $model->created_by = 1;
            $model->updated_by = 1;

            if ($model->save()) {
                DB::commit();
                return redirect()->route('list-menu')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('create-menu')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-menu')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $object = Menu::findOrFail($id);

        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-menu')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/menu/edit', [
            'object' => $object,
            'footerMenuPosition' => Config::get('constants.FOOTER_MENU_POSITION'),
            'callback' => url(URL::previous()),
        ]);
    }

    public function update(Request $request, $id)
    {
        $object = Menu::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-menu')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {
            $object->position = $request->input('position');
            $object->title = $request->input('title');
            $object->link = $request->input('link');
            $object->is_active = $request->input('is_active');
            $object->updated_by = 1;

            if ($object->save()) {

                DB::commit();
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }

                return redirect()->route('list-menu', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-menu', [
                'id' => $id,
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-menu', [
                'id' => $id,
                'callback' => $request->input('callback')
            ])->with('error', $e->getMessage());
        }
    }

    public function delete(Request $request)
    {
        $request = $request->all();

        // If got bad parameter(s)
        if (!isset($request['id']) || empty($request['id'])) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Menu::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        // If object is being used elsewhere
        if ($this->checkInUse($request['id'])) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.CANNOT_DELETE_IN_USING')], 404);
        }

        DB::beginTransaction();

        try {
            if ($object->delete()) {
                DB::commit();
                return response()->json(['status' => 'success', 'msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
            }
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()], 500);
        }
    }

    public function changeStatus(Request $request)
    {
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id']) || !isset($request['status']) || ($request['status'] != '0' && $request['status'] != '1')) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        $object = Menu::find($request['id']);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
        }

        // If object is being used elsewhere
        if ($request['status'] == '0') {
            if ($this->checkInUse($request['id'])) {
                return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.CANNOT_DEACTIVE_IN_USING')], 404);
            }
        }

        $object->is_active = $request['status'];

        if ($object->save()) {
            return response()->json(['status' => 'success', 'msg' => Config::get('constants.MESSAGE.CHANGE_STATUS_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error', 'msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);
    }

    public function sort(Request $request) {
        
        $request = $request->all();

        if (!isset($request['sort']) || !isset($request['id'])) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 200);
        }

        $object = Menu::find($request['id']);
        // If object not found
        if ($object == null || $object->count() == 0) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $object->sort = $request['sort'];

        if ($object->save()) {
            return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.UPDATE_SUCCEEDED')], 200);
        }
        return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 200);
    }

    private function validateStore($request)
    {
        $this->validate($request, [
            'position' => 'required',
            'title' => 'required|max:255',
        ], [
            'position.required' => 'Chưa chọn vị trí',
            'title.required' => 'Chưa có tiêu đề',
        ]);
    }

    private function validateUpdate($request, $id)
    {
        $this->validate($request, [
            'position' => 'required',
            'title' => 'required|max:255',
        ], [
            'position.required' => 'Chưa chọn vị trí',
            'title.required' => 'Chưa có tiêu đề',
        ]);
    }

    private function checkInUse($id)
    {
        return false;
    }
}
