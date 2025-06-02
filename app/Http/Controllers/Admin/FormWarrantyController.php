<?php

namespace App\Http\Controllers\Admin;

use App\Models\FormWarranty;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FormWarrantyController extends AdminController
{
    public function index(Request $request)
    {
        $q = FormWarranty::query();
        $req = $request->all();
        if (!empty($req['name'])) {
            $q->where('name', 'like', '%' . $req['name'] . '%');
        }
        if (!empty($req['phone'])) {
            $q->where('phone', 'like', '%' . $req['phone'] . '%');
        }
        $forms = $q->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.formwarranty.index', compact('forms', 'req'));
    }


    public function store(Request $request) {

        $validateResult = $this->validateStore($request);
        if ($validateResult) return $validateResult; // Nếu validateStore trả về response lỗi (AJAX)

        DB::beginTransaction();
        try {
            $model = new FormWarranty();
            $model->name = $request->input('name');
            $model->phone = $request->input('phone');
            $model->email = $request->input('email');
            $model->product_code = $request->input('product_code');
            $model->by_date = $request->input('by_date');
            $model->bill_images = $request->input('bill_images');
            if ($model->save()) {
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.FORMWARRANTY_IMAGE'), $model->id);
                $upload = $this->uploadImage($path, $request,'bill_images');
                $model->bill_images = $upload;
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
        $form = FormWarranty::findOrFail($id);
        return view('admin.formwarranty.show', compact('form'));
    } 

    public function delete(Request $request) {
        $request = $request->all();

        try {

            // If got bad parameter(s)
            if (!isset($request['id']) || empty($request['id'])) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }
    
            $object = FormWarranty::find($request['id']);
            // If object not found
            if ($object == null || $object->count() == 0) {
                return response()->json(['status' => 'error','msg' => Config::get('constants.MESSAGE.DATA_NOT_FOUND')], 404);
            }
    
            DB::beginTransaction();
            if ($object->delete()) {
                
                $path = sprintf(Config::get('constants.FILE_STORAGE_PATH.FORMWARRANTY_IMAGE'), $request['id']);
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
            return redirect()->route('list-formwarranty')->with('error', $e->getMessage()); 
        }
    }

    private function validateStore($request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'product_code' => 'required|string|max:255',
            'by_date' => 'required|date',
            'bill_images' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240', // 10MB
        ], [
            'name.required' => 'Chưa nhập họ tên',
            'phone.required' => 'Chưa nhập số điện thoại',
            'email.required' => 'Chưa nhập email',
            'email.email' => 'Email không hợp lệ',
            'address.required' => 'Chưa nhập địa chỉ',
            'product_code.required' => 'Chưa nhập mã sản phẩm',
            'by_date.required' => 'Chưa nhập ngày mua',
            'bill_images.file' => 'File hóa đơn không hợp lệ',
            'bill_images.mimes' => 'Chỉ chấp nhận file jpg, jpeg, png, pdf',
            'bill_images.max' => 'Dung lượng file hóa đơn tối đa 10MB',
        ]);
    }
}