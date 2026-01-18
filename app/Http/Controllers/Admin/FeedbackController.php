<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class FeedbackController extends AdminController
{
    /**
     * Create a feedback controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $list = Feedback::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin/feedback/index', compact('list'));
    }

    public function create() {
        return view('admin/feedback/create');
    }

    public function store(Request $request) {

        $this->validateStore($request);

        DB::beginTransaction();

        try {
            $model = new Feedback();
            $model->description = $request->input('description');
            $model->rate = $request->input('rate');
            $model->rate_by = $request->input('rate_by');
            $model->link = $request->input('link');
            $model->is_active = $request->input('is_active');
            $model->created_by = 1;
            $model->updated_by = 1;
            if ($model->save()) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.FEEDBACK_IMAGE'), $model->id);
                $upload = $this->uploadImage($path, $request);
                $model->image = $upload;
        
                if ($model->save()) {
                    DB::commit();
                    return redirect()->route('list-feedback')->with('success', Config::get('constants.MESSAGE.CREATE_SUCCEEDED'));
                }
                DB::rollBack();
                return redirect()->route('create-feedback')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
                
            }
            return redirect()->route('create-feedback')->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('create-feedback')->with('error', $e->getMessage()); 
        }
    }

    public function edit($id) {

        $object = Feedback::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-feedback')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        return view('admin/feedback/edit', [
            'object' => $object,
            'callback' => url(URL::previous())
        ]);
    }

    public function update(Request $request, $id) {
        $object = Feedback::find($id);

        // If object not found
        if ($object == null || $object->count() == 0) {
            return redirect()->route('list-feedback')->with('error', Config::get('constants.MESSAGE.DATA_NOT_FOUND'));
        }

        $this->validateUpdate($request, $id);

        DB::beginTransaction();

        try {

            $object->description = $request->input('description');
            $object->rate = $request->input('rate');
            $object->rate_by = $request->input('rate_by');
            $object->link = $request->input('link');
            $object->is_active = $request->input('is_active');
            $object->updated_by = 1;
                
            if($request->hasfile('image')) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.FEEDBACK_IMAGE'), $id);
                $prevImg = $object->image;
                $upload = $this->updateImage($path, $request);;
                $object->image = $upload;
            }

            if ($object->save()) {
                DB::commit();
                $parsedUrl = parse_url($request->input('callback'));
                $params = [];
                if (isset($parsedUrl['query'])) {
                    parse_str($parsedUrl['query'], $params);
                }

                return redirect()->route('list-feedback', $params)->with('success', Config::get('constants.MESSAGE.UPDATE_SUCCEEDED'));
            }
            DB::rollBack();
            return redirect()->route('edit-feedback', [
                'id' => $id, 
                'callback' => $request->input('callback')
            ])->with('error', Config::get('constants.MESSAGE.SOMETHING_ERROR'));

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('edit-feedback', [
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
    
            $object = Feedback::find($request['id']);
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
                
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.FEEDBACK_IMAGE'), $request['id']);
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
            return redirect()->route('create-feedback')->with('error', $e->getMessage()); 
        }
    }

    public function changeStatus(Request $request) {
        
        $request = $request->all();

        if (!isset($request['id']) || empty($request['id']) || !isset($request['status']) || ($request['status'] != '0' && $request['status'] != '1')) {
            return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 200);
        }

        $object = Feedback::find($request['id']);
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
            'description' => 'required',
            'rate' => 'required|max:255',
            'rate_by' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'description.required' => 'Chưa nhập nội dung',
            'rate.required' => 'Chưa nhập số *',
            'rate_by.required' => 'Chưa nhập tên người feedback',
            'image.required' => 'Chưa chọn ảnh',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
        ]);
    }

    private function validateUpdate($request, $id) {
        $this->validate($request, [
            'description' => 'required',
            'rate' => 'required|max:255',
            'rate_by' => 'required|max:255',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'description.required' => 'Chưa nhập nội dung',
            'rate.required' => 'Chưa nhập số *',
            'rate_by.required' => 'Chưa nhập tên người feedback',
            'image.image' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.mimes' => 'Chỉ chấp nhận ảnh có định dạng jpg, jpeg, png',
            'image.max' => 'Dung lượng ảnh không được quá 2MB',
        ]);
    }

    private function isUsing($id) {
        return false;
    }
}
