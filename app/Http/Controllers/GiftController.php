<?php

namespace App\Http\Controllers;

use App\Jobs\SendGiftEmail;
use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function list(){
        $gifts = Gift::where("is_active", 1)->orderByDesc("created_at")->paginate(12);
        return view('gift', [
            'gifts' => $gifts,
        ]);
    }
    
    public function store(Request $request){
        try {
            $data = $request->only(["name", "quantity", "phone", "address", "gift_id"]);
            $gift = Gift::find($data["gift_id"]);
            if($gift) {
                //insert db

                
                $this->sendMailGift($data, $gift);
                return true;
            }
        } catch (\Throwable $th) {
            \Log::error($th);
        }
        return false;
    }
    

    private function sendMailGift($data, $gift){
        $name = $data["name"] ?? ""; 
        $quantity = $data["quantity"] ?? ""; 
        $phone = $data["phone"] ?? ""; 
        $address = $data["address"] ?? "";
        $gift = $gift;
        return SendGiftEmail::dispatch($name, $quantity, $phone, $address, $gift);
    }
}