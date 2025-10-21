<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agency;
use App\Models\City;
use App\Models\KnowledgeCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class AgencyController extends AdminController
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
        $list = Agency::with(['city'])->orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/agency/index', [
            'list' => $list,
            'cities' => $this->getCities()
        ]);
    }

    public function create() {
        return view('admin/agency/create', [
            'cities' => $this->getCities()
        ]);
    }

    public function store(Request $request) {

        $this->validateStore($request);

        DB::beginTransaction();

        try {

            $model = new Agency();
            $model->name = $request->input('name');
            $model->city_id = $request->input('city_id');
            $model->address = $request->input('address');
            $model->map = $request->input('map');
            $model->phone = $request->input('phone');
            $model->is_active = $request->input('is_active');
            $model->created_by = 1;
            $model->updated_by = 1;
            if ($model->save()) {
                DB::commit();
                return redirect()->route('list-agency')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
            }
            return redirect()->route('create-agency')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-agency')->with('error', $e->getMessage()); 
        }
    }

    public function edit($id) {

        $object = Agency::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-agency')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/agency/edit', [
            'object' => $object,
            'cities' => $this->getCities(),
            'callback' => url(URL::previous())
        ]);
    }

    public function update(Request $request, $id) {
        $object = Agency::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-agency')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {
            $object->name = $request->input('name');
            $object->city_id = $request->input('city_id');
            $object->address = $request->input('address');
            $object->map = $request->input('map');
            $object->phone = $request->input('phone');
            $object->is_active = $request->input('is_active');
            $object->updated_by = 1;

            if ($object->save()) {
                DB::commit();
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }

                return redirect()->route('list-agency', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-agency', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-agency', [
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
    
            $object = Agency::find($request['id']);
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
                DB::commit();
                return response()->json(['status' => 'success','msg' => Config::get('constants.MESSAGE.DELETE_SUCCEEDED')], 200);
            }
            DB::rollBack();
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.SOMETHING_ERROR')], 403);

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-agency')->with('error', $e->getMessage()); 
        }
    }

    public function changeStatus(Request $request) {
        
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id']) || !isset($request['status']) || ($request['status'] != '0' && $request['status'] != '1')) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $object = Agency::find($request['id']);
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
            'city_id' => 'required',
            'name' => 'required|max:255',
        ], [
            'city_id.required' => 'Chưa chọn tỉnh/thành phố',
            'name.required' => 'Chưa nhập tiêu đề',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'city_id' => 'required',
            'name' => 'required|max:255',
        ], [
            'city_id.required' => 'Chưa chọn tỉnh/thành phố',
            'name.required' => 'Chưa nhập tiêu đề',
        ]);
    }

    private function isUsing($id) {
        return false;
    }

    protected function getCities() {
        return City::get();
    }
}
