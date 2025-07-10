<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contacts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FormContactsController extends AdminController
{
    public function index(Request $request)
    {
        $q = Contacts::query();
        $req = $request->all();
        if (!empty($req['name'])) {
            $q->where('name', 'like', '%' . $req['name'] . '%');
        }
        if (!empty($req['phone'])) {
            $q->where('phone', 'like', '%' . $req['phone'] . '%');
        }
        $forms = $q->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.formcontacts.index', compact('forms', 'req'));
    }

    public function show($id)
    {
        $form = Contacts::findOrFail($id);
        return view('admin.formcontacts.show', compact('form'));
    }

    public function delete(Request $request) {
        $request = $request->all();

        try {

            // If got bad parameter(s)
            if (!isset($request['id']) || empty($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }

            $object = Contacts::find($request['id']);
            // If object not found
            if ($object == null || $object->count() == 0) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
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
            return redirect()->route('list-formcontacts')->with('error', $e->getMessage());
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
