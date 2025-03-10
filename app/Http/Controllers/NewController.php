<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class NewController extends Controller
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
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($slug)
    {
        $new = News::where(["is_active" => 1, "slug" => $slug])->first();

        if (!$new) {
            return redirect(route("home"));
        }

        $news = News::where(["is_active" => 1])
        ->where("id", "!=", $new->id)->orderByDesc("created_at")->limit(5)->get();

        return view('new-show', [
            "new" => $new,
            "news" => $news,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(Request $request)
    {
        $keywork = $request->keyword;
        $news = News::query()->where("is_active", 1)->when($keywork, function($query) use($keywork){
            $query->where("title", "like", "%$keywork%");
        })->paginate(12)->withQueryString();
        $latestNews = News::query()->where("is_active", 1)->orderByDesc("created_at")->limit(5)->get();
        $latestProducts = Product::query()->where("is_active", 1)->orderByDesc("created_at")->limit(5)->get();

        return view('new-list', [
            "news" => $news,
            "keywork" => $keywork,
            "latestNews" => $latestNews,
            "latestProducts" => $latestProducts,
        ]);
    }
}
