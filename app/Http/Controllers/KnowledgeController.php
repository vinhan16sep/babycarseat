<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use App\Models\KnowledgeCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class KnowledgeController extends Controller
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
    public function show($category, $slug)
    {
        $category = KnowledgeCategory::where(["is_active" => 1, "slug" => $category])->first();

        if (!$category) {
            return redirect(route("home"));
        }

        $knowledge = Knowledge::where(["is_active" => 1, "slug" => $slug])
        ->whereHas("category", function($q) use($category){
            $q->where("knowledge_category.slug", $category->slug);
        })->with(["category"])->first();

        if (!$knowledge) {
            return redirect(route("home"));
        }

        $knowledges = Knowledge::where(["is_active" => 1])
        ->where("id", "!=", $knowledge->id)
        ->orderByDesc("created_at")->limit(5)->get();

        return view('knowledge-show', [
            "category" => $category,
            "knowledge" => $knowledge,
            "knowledges" => $knowledges
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(Request $request, $category)
    {
        $category = KnowledgeCategory::where(["is_active" => 1, "slug" => $category])->first();

        if (!$category) {
            return redirect(route("home"));
        }
        
        $keywork = $request->keyword;
        $knowledges = Knowledge::query()->where("is_active", 1)
        ->whereHas("category", function($q) use($category){
            $q->where("knowledge_category.slug", $category->slug);
        })->when($keywork, function($query) use($keywork){
            $query->where("title", "like", "%$keywork%");
        })->with(["category"])->paginate(12)->withQueryString();

        $latestKnowledges = Knowledge::query()->where("is_active", 1)->orderByDesc("created_at")->with(["category"])->limit(5)->get();
        $latestProducts = Product::query()->where("is_active", 1)->orderByDesc("created_at")->limit(5)->get();

        return view('knowledge-list', [
            "category" => $category,
            "keywork" => $keywork,
            "knowledges" => $knowledges,
            "latestKnowledges" => $latestKnowledges,
            "latestProducts" => $latestProducts,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function categories()
    {
        $query = KnowledgeCategory::query()->where("is_active", 1);
        $knowledgeCategories = $query->get();

        return view('knowledge-category', [
            "knowledgeCategories" => $knowledgeCategories
        ]);
    }
}
