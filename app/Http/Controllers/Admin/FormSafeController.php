<?php

namespace App\Http\Controllers\Admin;

use App\Models\FormSafe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FormSafeController extends AdminController
{
    public function index(Request $request)
    {
        $q = FormSafe::query();
        $req = $request->all();
        if (!empty($req['name'])) {
            $q->where('name', 'like', '%' . $req['name'] . '%');
        }
        if (!empty($req['phone'])) {
            $q->where('phone', 'like', '%' . $req['phone'] . '%');
        }
        $forms = $q->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.formsafe.index', compact('forms', 'req'));
    }


    public function store(Request $request) {

        $validateResult = $this->validateStore($request);
        if ($validateResult) return $validateResult; // Nếu validateStore trả về response lỗi (AJAX)

        DB::beginTransaction();
        try {
            $model = new FormSafe();
            $model->name = $request->input('name');
            $model->phone = $request->input('phone');
            $model->email = $request->input('email');
            $model->address = $request->input('address');
            $model->product_code = $request->input('product_code');
            $model->by_date = $request->input('by_date');
            $model->report_images = $request->input('report_images');
            $model->code = $request->input('code');
            if ($model->save()) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.FORMSAFE_IMAGE'), $model->id);
                $upload = $this->uploadImage($path, $request,'report_images');
                $model->report_images = $upload;
                $upload = $this->uploadImage($path, $request,'env_images');
                $model->env_images = $upload;
                if ($model->save()) {
                    DB::commit();
                    return response()->json([
                        'success' => true,
                        'message' => Config::get('constants.MESSAGE.CREATE_SUCCEEDED'),
                        'data' => $model
                    ], 200);
                }
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => Config::get('constants.MESSAGE.SOMETHING_ERROR')
                ], 500);
            }
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => Config::get('constants.MESSAGE.SOMETHING_ERROR')
            ], 500);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $form = FormSafe::findOrFail($id);
        return view('admin.formsafe.show', compact('form'));
    }

    public function delete(Request $request) {
        $request = $request->all();

        try {

            // If got bad parameter(s)
            if (!isset($request['id']) || empty($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }

            $object = FormSafe::find($request['id']);
            // If object not found
            if ($object == null || $object->count() == 0) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }

            DB::beginTransaction();
            if ($object->delete()) {

                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.FORMSAFE_IMAGE'), $request['id']);
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
            return redirect()->route('list-formsafe')->with('error', $e->getMessage());
        }
    }

    private function validateStore($request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'product_code' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'by_date' => 'required|date',
            'report_images' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240', // 10MB
            'env_images' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ], [
            'name.required' => 'Chưa nhập họ tên',
            'phone.required' => 'Chưa nhập số điện thoại',
            'email.required' => 'Chưa nhập email',
            'email.email' => 'Email không hợp lệ',
            'address.required' => 'Chưa nhập địa chỉ',
            'product_code.required' => 'Chưa nhập mã sản phẩm',
            'code.required' => 'Chưa nhập mã bảo hành/ mã hóa đơn',
            'by_date.required' => 'Chưa nhập ngày mua',
            'report_images.required' => 'Chưa chọn file báo cáo',
            'report_images.file' => 'File biên bản tai nạn giao thông không hợp lệ',
            'report_images.mimes' => 'Chỉ chấp nhận file jpg, jpeg, png, pdf',
            'report_images.max' => 'Dung lượng file biên bản tai nạn giao thông tối đa 10MB',
            'env_images.file' => 'File hiện trường không hợp lệ',
            'env_images.mimes' => 'Chỉ chấp nhận file jpg, jpeg, png, pdf',
            'env_images.max' => 'Dung lượng file hiện trường tối đa 10MB',
        ]);
    }
}
