<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    const SORTS = [
        "date" => [
            "column" => "created_at",
            "sort" => "desc",
            "title" => "Mới nhất"
        ],
        "price" => [
            "column" => "price",
            "sort" => "asc",
            "title" => "Giá từ thấp đến cao"
        ],
        "price-desc" => [
            "column" => "price",
            "sort" => "desc",
            "title" => "Giá từ cao xuống thấp"
        ],
    ];
    const STEP_PRICE = 500000;
    const DEFAULT_MAX_PRICE = 10000000;

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
        $product = Combo::where(["is_active" => 1, "slug" => $slug])->first();

        if (!$product) {
            return redirect(route("home"));
        }

        $products = Combo::query()->with(["products"])
            ->where(["is_active" => 1])
            ->where("slug", "!=", $slug)->limit(16)->orderByDesc("is_highlight")->get();

        return view('combo-show', [
            "product" => $product,
            "products" => $products,
        ]);
    }
    
    public function list(Request $request) {

        $filter_keyword = $request->get("keyword");
        $filter_min_price = str_replace(",","", $request->get("min_price"));
        $filter_max_price = str_replace(",","", $request->get("max_price"));
        $productPriceMax = Combo::query()->orderBy("price", "desc")->first();
        if($productPriceMax->price) {
            $maxPrice = ceil((int)$productPriceMax->price/self::STEP_PRICE) * self::STEP_PRICE;
        }

        $query = Combo::query()->where("is_active", 1);

        // Tên combo
        if (!empty($filter_keyword)) {
            $query->where('name', "like", "%$filter_keyword%");
        }

        //Khoảng giá
        if (is_numeric($filter_min_price) && is_numeric($filter_max_price)) {
            $query->where(function($query) use($filter_min_price, $filter_max_price){
                $query->where(function($query) use($filter_min_price, $filter_max_price){
                    $query->where("is_discount", 0)->whereBetween("price", [$filter_min_price, $filter_max_price]);
                });
                $query->orWhere(function($query) use($filter_min_price, $filter_max_price){
                    $query->where("is_discount", 1)->whereBetween("discount_value", [$filter_min_price, $filter_max_price]);
                });
            });
        }

        //Sắp xếp
        if ($request->orderBy && isset(self::SORTS[$request->orderBy])) {
            $query->orderBy(self::SORTS[$request->orderBy]["column"], self::SORTS[$request->orderBy]["sort"]);
        }

        $products = $query->with(["products"])->paginate(15)->withQueryString();
        
        return view('combo-list', [
            "products" => $products,
            "sorts" => self::SORTS,
            "product_price_max" => $maxPrice ?? self::DEFAULT_MAX_PRICE,
        ]);
    }
}
