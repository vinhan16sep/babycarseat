<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Feature;
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
    public function show($slug)
    {
        $product = Product::where(["is_active" => 1, "slug" => $slug])->first();

        if (!$product) {
            return redirect(route("home"));
        }

        $products = Product::query()
            ->with(["productColors", "categories", "features"])
            ->where([
            "is_active" => 1
            ])
            ->orderByDesc("is_highlight")->get();

        // Lấy toàn bộ features của product qua join, sắp xếp theo product_feature.sort
        $features = Feature::select('feature.*')
            ->join('product_feature', 'product_feature.feature_id', '=', 'feature.id')
            ->where('product_feature.product_id', $product->id)
            ->orderBy('product_feature.sort', 'asc');

        // Lấy features label = UPPER, sắp xếp theo product_feature.sort
        $featuresUPPER = (clone $features)
            ->where('feature.label', ProductController::TYPE_UPPER)
            ->where('feature.is_active', 1)
            ->orderBy('product_feature.sort', 'asc')
            ->get();

        // Lấy features label = LOWER, sắp xếp theo product_feature.sort
        $featuresLOWER = (clone $features)
            ->where('feature.label', ProductController::TYPE_LOWER)
            ->where('feature.is_active', 1)
            ->orderBy('product_feature.sort', 'asc')
            ->get();

        // Lấy lại features của product, join để lấy đúng thứ tự sort
        $attributes = Feature::select('feature.*', 'product_feature.sort')
            ->join('product_feature', 'product_feature.feature_id', '=', 'feature.id')
            ->where('product_feature.product_id', $product->id)
            ->where('feature.is_active', 1)
            ->orderBy('product_feature.sort', 'asc')
            ->get()
            ->groupBy('label');

        return view('product-show', [
            "product" => $product,
            "products" => $products,
            "attributes" => $attributes,
            "featuresUPPER" => $featuresUPPER,
            "featuresLOWER" => $featuresLOWER,
        ]);
    }

    public function list(Request $request, $category_slug = null) {
        $query = Product::query()->where("is_active", 1);

        //Sắp xếp
        // $orderBy = $request->orderBy ?? 'date';
        // if (isset(self::SORTS[$orderBy])) {
        //     $query->orderBy(self::SORTS[$orderBy]["column"], self::SORTS[$orderBy]["sort"]);
        // }

        $category = [];
        if ($category_slug) {
            $category = ProductCategory::query()->where('slug', $category_slug)->first();

            if ($category) {
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('product_categories.id', $category->id);
                });
            }
        } else {
            $categories = ProductCategory::query()->get();
        }

        $products = $query->with(["productColors", "categories"])->orderBy('products.sort', 'asc')->get();

        return view('product-list', [
            "products" => $products,
            "category" => $category ?? null,
            "categories" => $categories ?? null,
            "sorts" => self::SORTS,
        ]);
    }

    function productByType(Request $request, $slug) {
        $type = Type::where('slug', $slug)->first();

        if (!$type) {
            return redirect(route("home"));
        }

        $products = Product::query()
            ->where('is_active', 1)
            ->where('type_id', $type->id)
            ->with(['productColors', 'categories'])
            ->orderBy('products.sort', 'asc')
            ->get();

        return view('product-list', [
            "products" => $products,
            "category" => null,
            "sorts" => self::SORTS,
        ]);
    }
}
