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
    public function list(Request $request, $category = null)
    {
        $categories = KnowledgeCategory::query()->where("is_active", 1)->get();
        if ($category) {
            $category = KnowledgeCategory::query()->where(["is_active" => 1, 'slug' => $category])->first();
        }
        $knowledges = Knowledge::query()->where("is_active", 1)
            ->when($category, function($query) use($category){
                return $query->whereHas("category", function($q) use($category){
                    $q->where("knowledge_category.slug", $category->slug);
                });
            })->with(["category"])->paginate(12)->withQueryString();

        $latestKnowledges = Knowledge::query()->where("is_active", 1)->orderByDesc("created_at")->with(["category"])->limit(5)->get();

        return view('knowledge-list', [
            "category" => $category,
            "categories" => $categories,
            "knowledges" => $knowledges,
            "latestKnowledges" => $latestKnowledges,
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
