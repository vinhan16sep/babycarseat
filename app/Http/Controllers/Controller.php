<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\ProductCategory;
use App\Models\Brand;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $contactInformations = [];
    protected $ver = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->productCategories = $this->getProductCategory();
        $this->brands = $this->getBrand();
        $this->contactInformations = $this->getContactInformations();
        $this->ver = Config::get('site_settings.assets_ver');
        View::share('contactInformations', $this->contactInformations);
        View::share('ver', $this->ver);
    }

    protected function getProductCategory() {
        return ProductCategory::get();
    }

    protected function getBrand() {
        return Brand::get();
    }

    protected function getContactInformations() {
        $objects = Information::where(['type' => 'CONTACT'])->get()->toArray();
        $contactInformations = [];
        foreach ($objects as $item) {
            $contactInformations[$item['label']] = $item['value'];
        }
        return $contactInformations;
    }
}
