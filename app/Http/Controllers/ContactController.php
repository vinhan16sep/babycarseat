<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactEmail;
use Exception;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
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
    
    public function show(){

        return view('contact', [
            "contactInformations" => $this->contactInformations,
        ]);
    }

    public function store(Request $request){
         $validateResult = $this->validateStore($request);
        if ($validateResult) return $validateResult; // Nếu validateStore trả về response lỗi (AJAX)

        DB::beginTransaction();
        // try {
            $model = new Contacts();
            $model->name = $request->input('name');
            $model->email = $request->input('email');
            $model->phone = $request->input('phone');
            $model->content = $request->input('message');
            if ($model->save()) {
                
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
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     return response()->json([
        //         'success' => false,
        //         'message' => $e->getMessage()
        //     ], 500);
        // }
    }
    

    private function sendMailContact($data){
        $name = $data["name"] ?? ""; 
        $email = $data["email"] ?? ""; 
        $phone = $data["phone"] ?? ""; 
        $message = $data["message"] ?? "";
        return SendContactEmail::dispatch($name, $phone, $email, $message);
    }

    private function validateStore($request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ], [
            'name.required' => 'Chưa nhập họ tên',
            'phone.required' => 'Chưa nhập số điện thoại',
            'email.required' => 'Chưa nhập email',
            'email.email' => 'Email không hợp lệ'
        ]);
    }
}