<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Grape;
use App\Models\Information;
use App\Models\Region;
use App\Models\Type;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $activedCountries = [];
    protected $activedRegions = [];
    protected $activedTypes = [];
    protected $activedGrapes = [];
    protected $contactInformations = [];
    protected $ver = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->activedCountries = $this->getActivedCountries();
//        $this->activedRegions = $this->getActivedRegions();
//        $this->activedTypes = $this->getActivedTypes();
//        $this->activedGrapes = $this->getActivedGrapes();
//        $this->contactInformations = $this->getContactInformations();
        $this->ver = Config::get('site_settings.assets_ver');
        View::share('contactInformations', $this->contactInformations);
        View::share('ver', $this->ver);
    }

    protected function getActivedCountries() {
        return Country::where(['is_active' => '1'])->get();
    }

    protected function getActivedRegions() {
        return Region::where(['is_active' => '1'])->get();
    }

    protected function getActivedTypes() {
        return Type::where(['is_active' => '1'])->get();
    }

    protected function getActivedGrapes() {
        return Grape::where(['is_active' => '1'])->get();
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
