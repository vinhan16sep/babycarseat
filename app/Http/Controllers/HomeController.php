<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\HomeBlock;
use App\Models\Knowledge;
use App\Models\News;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    const TYPE_UPPER = "UPPER";
    const TYPE_LOWER = "LOWER";
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
    public function index()
    {
        $feedback = Feedback::query()->where(["is_active" => 1])->orderByDesc("created_at")->limit(3)->get();
        $banners = Banner::query()->where('is_active', 1)->get();
        $upper = HomeBlock::getDataByType(self::TYPE_UPPER);
        $lower = HomeBlock::getDataByType(self::TYPE_LOWER);
        return view('home', [
            'upper' => $upper,
            'lower' => $lower,
            'banners' => $banners,
            'hotProducts' => Product::getHotProducts(),
            'feedback' => $feedback
        ]);



        $banners = Banner::query()->where(["is_active" => 1])->get();
        $types = Type::where("is_active", 1)->get();
        $products = Product::query()->where(["is_active" => 1, "is_highlight" => 1])->with(["grape:id,name", "type:id,name", "country:id,name", "region:id,name"])->orderByDesc("created_at")->get();
        $news = News::query()->where(["is_active" => 1])->orderByDesc("created_at")->limit(10)->get();
        $knowledges = Knowledge::query()->where(["is_active" => 1])->orderByDesc("created_at")->with(["category:id,slug"])->limit(6)->get();
        $homeBlocks = HomeBlock::where("is_active", 1)->get();
        $groupTypeProduct = [];
        foreach($products as $product) {
            if(is_null($product->type)) continue;
            if (!isset($groupTypeProduct[$product->type->id]["type"])) {
                $groupTypeProduct[$product->type->id]["type"] = $product->type;
            }
            $groupTypeProduct[$product->type->id]["products"][] = $product;
        }

        return view('home', [
            "banners" => $banners,
            "news" => $news,
            "knowledges" => $knowledges,
            "types" => $types,
            "groupTypeProduct" => $groupTypeProduct,
            "homeBlocks" => $homeBlocks,
            'feedback' => $feedback
        ]);
    }

    public function search(Request $request) {
        $filter_keyword = (string)$request->get("keyword");

        $query = Product::query()->where("is_active", 1);

        if(!empty($filter_keyword)) {
            $query->where("name", "like", "%$filter_keyword%");
        }

        $products = $query->with(["grape:id,name", "type:id,name", "country:id,name", "region:id,name"])->paginate(20)->withQueryString();

        return view('product-search', [
            "products" => $products,
        ]);
    }

    public function babyroHub(){
        return view('babyro-hub', [

        ]);
    }
}
