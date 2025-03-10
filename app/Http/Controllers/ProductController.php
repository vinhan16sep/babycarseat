<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Grape;
use App\Models\Product;
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
            ->with(["grape:id,name,slug", "type:id,name,slug", "country:id,name,slug", "region:id,name,slug"])
            ->where([
                "is_active" => 1, 
                'grape_id' => $product->grape_id, 
                'type_id' => $product->type_id, 
                'country_id' => $product->country_id
            ])
            ->where("slug", "!=", $slug)->limit(16)->orderByDesc("is_highlight")->get();

        $bestProducts = Product::query()
            ->with(["grape:id,name,slug", "type:id,name,slug", "country:id,name,slug", "region:id,name,slug"])
            ->where(["is_active" => 1, 'is_hot' => 1])
            ->where("slug", "!=", $slug)->limit(5)->orderByDesc("created_at")->get();

        $countries = Country::query()
            ->where(["is_active" => 1])
            ->orderByDesc("created_at")->get();

        $types = Type::query()
            ->where(["is_active" => 1])
            ->orderByDesc("created_at")->get();

        $grapes = Grape::query()
            ->where(["is_active" => 1])
            ->orderByDesc("created_at")->get();


        return view('product-show', [
            "product" => $product,
            "products" => $products,
            "bestProducts" => $bestProducts,
            "countries" => $countries,
            "types" => $types,
            "grapes" => $grapes,
        ]);
    }

    public function list(Request $request, $country = null) {
        $countries = Country::where("is_active", 1)->get()->keyBy("slug");

        if ($country && empty($countries[$country])) {
            return redirect("ruou-vang");
        }

        $grapes = Grape::where("is_active", 1)->get();
        $regions = Region::where("is_active", 1)->get();
        $types = Type::where("is_active", 1)->get();
        $filter_types = array_keys( $request->get("types", []) );
        $filter_regions = array_keys( $request->get("regions", []) );
        $filter_grapes = array_keys( $request->get("grapes", []) );
        $filter_min_price = str_replace(",","", $request->get("min_price"));
        $filter_max_price = str_replace(",","", $request->get("max_price"));
        $productPriceMax = Product::query()->orderBy("price", "desc")->first();
		$maxPrice = self::DEFAULT_MAX_PRICE;
		if ($productPriceMax !== null) {
			if($productPriceMax->price) {
				$maxPrice = ceil((int)$productPriceMax->price/self::STEP_PRICE) * self::STEP_PRICE;
			}
		}

        $query = Product::query()->where("is_active", 1);

        // Quốc gia
        if (!empty($country)) {
            $country = $countries[$country];
            $query->where('country_id', $country->id);
        }

        // Loại vang
        if (!empty($filter_types)) {
            $query->whereIn('type_id', $filter_types);
        }

        // Vùng trồng nho
        if (!empty($filter_regions)) {
            $query->whereIn('region_id', $filter_regions);
        }

        // Giống nho
        if (!empty($filter_grapes)) {
            $query->whereIn('grape_id', $filter_grapes);
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

        $products = $query->with(["grape:id,name", "type:id,name", "country:id,name", "region:id,name"])->paginate(15)->withQueryString();

        return view('product-list', [
            "types" => $types,
            "country" => $country,
            "countries" => $countries,
            "grapes" => $grapes,
            "regions" => $regions,
            "products" => $products,
            "sorts" => self::SORTS,
            "product_price_max" => $maxPrice ?? self::DEFAULT_MAX_PRICE,
        ]);
    }
}
