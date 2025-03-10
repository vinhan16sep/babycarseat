<?php

namespace App\Http\Controllers;

use App\Models\Promotion;

class PromotionController extends Controller
{
    public function list(){
        $highlightPromotions = Promotion::where("is_active", 1)->where("is_highlight", 1)->with(["product", "combo"])->orderByDesc("created_at")->limit(3)->get();
        $promotions = Promotion::where("is_active", 1)->with(["product", "combo"])->orderByDesc("created_at")->paginate(12);
        return view('promotion', [
            'promotions' => $promotions,
            'highlightPromotions' => $highlightPromotions
        ]);
    }
}