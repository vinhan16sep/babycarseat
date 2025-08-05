<?php

namespace App\Providers;

use App\Models\Information;
use App\Models\Menu;
use App\Models\ProductCategory;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
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
            && Schema::hasTable('menu')
            && Schema::hasTable('types')
        ) {
            // CONMMON CONTACTS
            $objects = Information::where(['type' => 'CONTACT'])->get()->toArray();
            $contactInformations = [];
            foreach ($objects as $item) {
                $contactInformations[$item['label']] = $item['value'];
            }
            View::share('contactInformations', $contactInformations);

            // BẢO HÀNH CONTACTS
            $objects = Information::where(['type' => 'WARRANTY'])->get()->toArray();
            $contactWarranty = [];
            foreach ($objects as $item) {
                $contactWarranty[$item['label']] = $item['value'];
            }
            View::share('contactWarranty', $contactWarranty);

            // ĐỔI MIỄN PHÍ CONTACTS
            $objects = Information::where(['type' => 'EXCHANGE'])->get()->toArray();
            $contactExchange = [];
            foreach ($objects as $item) {
                $contactExchange[$item['label']] = $item['value'];
            }
            View::share('contactExchange', $contactExchange);

            $categories = ProductCategory::query()->get();
            
            // Lấy toàn bộ sản phẩm đã kích hoạt và nhóm theo category_id
            // Chỉ áp dụng cho sản phẩm thuộc loại ghế ô tô trẻ em
            $rawProducts = DB::table('product_categories_mapping as pcm')
                ->join('products as p', 'p.id', '=', 'pcm.product_id')
                ->where('p.is_active', 1)
				->where('p.type_id', 1) // 1 là loại ghế ô tô trẻ em
                ->select('p.*', 'pcm.category_id')
                ->orderBy('pcm.category_id')
                ->orderBy('p.sort')
                // ->orderByDesc('p.created_at')
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

            // Get loai sản phẩm
            $productTypes = Type::where('is_active', 1)->get();
            View::share('productTypes', $productTypes);

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

            // Lấy menu footer
            $footerMenuPosition = Config::get('constants.FOOTER_MENU_POSITION');
            $footerMenu = [];
            $footerMenu = Menu::orderBy('position', 'asc')->orderBy('sort', 'asc')
                ->where('location', Config::get('constants.MENU_LOCATION.FOOTER'))
                ->get(); 

            View::share('footerMenuPosition', $footerMenuPosition);
            View::share('footerMenu', $footerMenu);
        }
    }
}
