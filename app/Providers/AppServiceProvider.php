<?php

namespace App\Providers;

use App\Models\Information;
use App\Models\ProductCategory;
use App\Models\PostCategory;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Lấy path từ request
        $currentPath = Request::path();
        View::share('currentPath', $currentPath);
        
        Paginator::useBootstrap();

        if (
            Schema::hasTable('informations')
            && Schema::hasTable('product_categories')
            && Schema::hasTable('post_category')
            && Schema::hasTable('posts')
        ) {

            $objects = Information::where(['type' => 'CONTACT'])->get()->toArray();
            $contactInformations = [];
            foreach ($objects as $item) {
                $contactInformations[$item['label']] = $item['value'];
            }
            View::share('contactInformations', $contactInformations);

            $categories = ProductCategory::query()->get();
            
            $rawProducts = DB::table('product_categories_mapping as pcm')
                ->join('products as p', 'p.id', '=', 'pcm.product_id')
                ->where('p.is_active', 1)
                ->select('p.*', 'pcm.category_id')
                ->orderBy('pcm.category_id')
                ->orderByDesc('p.created_at')
                ->get();

            // Nhóm theo category_id và lấy 4 sản phẩm đầu tiên
            $groupedProducts = $rawProducts->groupBy('category_id')->map(function ($group) {
                return $group->take(4)->sortByDesc('is_highlight');
            });

            $categories->map(function ($category) use ($groupedProducts) {
                $category->setRelation('products', $groupedProducts->get($category->id) ?? collect());
                return $category->toArray();
            });

            View::share('categoriesMenu', $categories);

            // 1. Lấy toàn bộ danh mục (có cấp 1, 2, 3)
            $categories = PostCategory::where('is_active', 1)
                ->where('menu_active', 1)
                ->get();

            $allPosts = Post::where('menu_active', 1)
                ->where('menu_active', 1)
                ->get();

            $menu = [];

            $categoriesByParent = $categories->groupBy('parent_id');

            foreach ($categoriesByParent[null] ?? [] as $lv1) {
                $menu[$lv1->slug] = [
                    'id' => "post-" . $lv1->id,
                    'name' => $lv1->name,
                    'children' => [],
                ];

                foreach ($categoriesByParent[$lv1->id] ?? [] as $lv2) {
                    $posts = $allPosts->where('category_id', $lv2->id)
                        ->map(function ($post) {
                            return $post;
                        })->values()->toArray();

                    $menu[$lv1->slug]['children'][$lv2->slug] = [
                        'id' => "post-" . $lv2->id,
                        'name' => $lv2->name,
                        'posts' => $posts,
                    ];

                    // foreach ($categoriesByParent[$lv2->id] ?? [] as $lv3) {
                    //     $posts = $allPosts->where('category_id', $lv3->id)
                    //         ->map(function ($post) {
                    //             return $post;
                    //         })->values()->toArray();

                    //     $menu[$lv1->slug]['children'][$lv2->slug]['children'][$lv3->slug] = [
                    //         'name' => $lv3->name,
                    //         'posts' => $posts,
                    //     ];
                    // }
                }
            }

            View::share('mainMenu', $menu);
        }
    }
}
