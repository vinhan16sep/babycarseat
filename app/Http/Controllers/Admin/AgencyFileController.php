<?php

namespace App\Http\Controllers\Admin;

use App\Models\AgencyFile;
use App\Models\Agency;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class AgencyFileController extends AdminController
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
        $list = AgencyFile::with('agency')->orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/agency-file/index', compact('list'));
    }

    public function view($id, $filename = null)
    {
        $file = AgencyFile::findOrFail($id);
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
        $agencies = Agency::where(['is_active' => 1])->get();
        return view('admin/agency-file/create', [
            'agencies' => $agencies,
        ]);
    }

    public function store(Request $request) {

        $this->validateStore($request);

        DB::beginTransaction();

        try {
            $model = new AgencyFile();

            $model->agency_id = $request->input('agency_id');
            $model->type = 1; // Default to type 1
            $model->file_name = '';
            $model->file_path = '';
            $model->is_active = $request->input('is_active');
            if ($model->save()) {
                if($request->hasfile('file')) {
                    $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.AGENCY_FILE'), $request->input('agency_id'));
                    list($name, $fullPath) = $this->uploadFile($path, $request, 'file');
                    $model->file_name = $name;
                    $model->file_path = $fullPath;
                    if ($model->save()) {
                        DB::commit();
                        return redirect()->route('list-agency-file')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                    }
                } else {
                    return redirect()->route('create-agency-file')->with('error', Config::get('constants.MESSAGE.AGENCY_FILE_REQUIRED'));
                }
            }
            return redirect()->route('create-agency-file')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-agency-file')->with('error', $e->getMessage()); 
        }
    }

    public function delete(Request $request) {
        $request = $request->all();


        try {

            // If got bad parameter(s)
            if (!isset($request['id']) || empty($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }
    
            $object = AgencyFile::find($request['id']);
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
                
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.AGENCY_FILE'), $object->agency_id);
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
            return redirect()->route('create-agency-file')->with('error', $e->getMessage()); 
        }
    }

    private function validateStore($request) {
        $this->validate($request, [
            'agency_id' => 'required|integer',
            'file'       => 'required|mimes:pdf|max:10240', // 10MB max
        ], [
            'agency_id.required' => 'Vui lòng chọn sản phẩm.',
            'file.required' => 'Vui lòng chọn file.',
            'file.mimes'    => 'Chỉ được upload file PDF.',
            'file.max'      => 'Dung lượng file không vượt quá 10MB.',
        ]);
    }

    private function isUsing($id) {
        return false;
    }
}
