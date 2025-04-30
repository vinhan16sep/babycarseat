<?php

namespace App\Providers;

use App\Models\Information;
use App\Models\ProductCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        $objects = Information::where(['type' => 'CONTACT'])->get()->toArray();
        $contactInformations = [];
        foreach ($objects as $item) {
            $contactInformations[$item['label']] = $item['value'];
        }
        View::share('contactInformations', $contactInformations);

        $categories = ProductCategory::query()->get()->toArray();
        View::share('categoriesMenu', $categories);
    }
}
