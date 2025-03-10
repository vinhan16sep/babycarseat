<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\AccessoryCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class AccessoryController extends Controller
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
    public function show($category, $slug)
    {
        $category = AccessoryCategory::where(["is_active" => 1, "slug" => $category])->first();

        if (!$category) {
            return redirect(route("home"));
        }

        $accessory = Accessory::where(["is_active" => 1, "slug" => $slug])
        ->whereHas("category", function($q) use($category){
            $q->where("accessory_category.slug", $category->slug);
        })->with(["category"])->first();

        if (!$accessory) {
            return redirect(route("home"));
        }

        $accessories = Accessory::where(["is_active" => 1])
        ->where("id", "!=", $accessory->id)
        ->orderByDesc("created_at")->limit(5)->get();

        return view('accessory-show', [
            "category" => $category,
            "accessory" => $accessory,
            "accessories" => $accessories
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(Request $request, $category)
    {
        $category = AccessoryCategory::where(["is_active" => 1, "slug" => $category])->first();

        if (!$category) {
            return redirect(route("home"));
        }
        
        $keywork = $request->keyword;
        
        $filter_min_price = str_replace(",","", $request->get("min_price"));
        $filter_max_price = str_replace(",","", $request->get("max_price"));
        $productPriceMax = Accessory::query()->orderBy("price", "desc")->first();
		$maxPrice = self::DEFAULT_MAX_PRICE;
		if ($productPriceMax !== null) {
			if($productPriceMax->price) {
				$maxPrice = ceil((int)$productPriceMax->price/self::STEP_PRICE) * self::STEP_PRICE;
			}
		}
        
        $query =  Accessory::query()->where("is_active", 1);
        //Khoảng giá
        if (is_numeric($filter_min_price) && is_numeric($filter_max_price)) {
            $query->where(function($query) use($filter_min_price, $filter_max_price){
                $query->whereBetween("price", [$filter_min_price, $filter_max_price]);
            });
        }

        //Sắp xếp
        if ($request->orderBy && isset(self::SORTS[$request->orderBy])) {
            $query->orderBy(self::SORTS[$request->orderBy]["column"], self::SORTS[$request->orderBy]["sort"]);
        }


        $accessories = $query->whereHas("category", function($q) use($category){
            $q->where("accessory_category.slug", $category->slug);
        })->when($keywork, function($query) use($keywork){
            $query->where("title", "like", "%$keywork%");
        })->with(["category"])->paginate(12)->withQueryString();

        return view('accessory-list', [
            "category" => $category,
            "keywork" => $keywork,
            "accessories" => $accessories,
            "sorts" => self::SORTS,
            "product_price_max" => $maxPrice ?? self::DEFAULT_MAX_PRICE,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function categories()
    {
        $query = AccessoryCategory::query()->where("is_active", 1);
        $accessoryCategories = $query->get();

        return view('accessory-category', [
            "accessoryCategories" => $accessoryCategories
        ]);
    }
}
