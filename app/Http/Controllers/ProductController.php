<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Country;
use App\Models\Grape;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\Region;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        return view('product-list');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($category, $slug)
    {
        $product = Product::where(["is_active" => 1, "slug" => $slug])->first();

        if (!$product) {
            return redirect(route("home"));
        }

        $products = Product::query()
            ->with(["productColors", "categoryId"])
            ->where([
                "is_active" => 1
            ])
//            ->where("slug", "!=", $slug)
            ->orderByDesc("is_highlight")->get();

        return view('product-show', [
            "product" => $product,
            "products" => $products,
            "attributes" => $product->features->groupBy('label')
        ]);
    }

    public function list(Request $request, $category_slug = null) {
        $query = Product::query()->where("is_active", 1);

        //Sắp xếp
        $orderBy = $request->orderBy ?? 'date';
        if (isset(self::SORTS[$orderBy])) {
            $query->orderBy(self::SORTS[$orderBy]["column"], self::SORTS[$orderBy]["sort"]);
        }

        $category = null;
        if ($category_slug) {
            $category = ProductCategory::query()->where('slug', $category_slug)->first();
        }
        $products = $query->with(["productColors", "categoryId"])->when($category, function($q) use($category){
            $q->where('category_id', $category->id);
        })->get();
        if ($category_slug) {
            $category = ProductCategory::query()->where('slug', $category_slug)->first();
        }

        return view('product-list', [
            "products" => $products,
            "category" => $category,
            "sorts" => self::SORTS,
        ]);
    }
}
