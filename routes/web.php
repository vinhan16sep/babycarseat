<?php

use App\Http\Controllers\Admin\AccessoryCategoryController;
use App\Http\Controllers\Admin\AccessoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\GrapeController;
use App\Http\Controllers\Admin\HomeBlockController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostTaskController;
use App\Http\Controllers\Admin\KnowledgeCategoryController;
use App\Http\Controllers\Admin\KnowledgeController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['site_settings']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('lien-he', [App\Http\Controllers\ContactController::class, 'show'])->name('contact');
    Route::post('lien-he', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
    Route::get('ruou-vang', [App\Http\Controllers\ProductController::class, 'list'])->name('ruou-vang');
    Route::get('/tim-kiem', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    Route::get('/combo', [App\Http\Controllers\ComboController::class, 'list'])->name('combo');
    Route::get('/tin-tuc', [App\Http\Controllers\NewController::class, 'list'])->name('news');
    Route::get('/kien-thuc', [App\Http\Controllers\KnowledgeController::class, 'categories'])->name('category-list-knowledge');
    Route::get('/kien-thuc/{category}', [App\Http\Controllers\KnowledgeController::class, 'list'])->name('category-detail-knowledge');
    Route::get('/kien-thuc/{category}/{slug}', [App\Http\Controllers\KnowledgeController::class, 'show'])->name('detail-knowledge');
    Route::get('/phu-kien', [App\Http\Controllers\AccessoryController::class, 'categories'])->name('category-list-accessory');
    Route::get('/phu-kien/{category}', [App\Http\Controllers\AccessoryController::class, 'list'])->name('category-detail-accessory');
    Route::get('/phu-kien/{category}/{slug}', [App\Http\Controllers\AccessoryController::class, 'show'])->name('detail-accessory');
    Route::get('/khuyen-mai', [App\Http\Controllers\PromotionController::class, 'list'])->name('promotion-list');
    Route::get('/qua-tang', [App\Http\Controllers\GiftController::class, 'list'])->name('gift-list');
    Route::post('/qua-tang', [App\Http\Controllers\GiftController::class, 'store'])->name('gift-store');
    Route::get('/quoc-gia/{country}', [App\Http\Controllers\ProductController::class, 'list'])->name('country');
    Route::get('/san-pham/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('san-pham');
    Route::get('/tin-tuc/{slug}', [App\Http\Controllers\NewController::class, 'show'])->name('detail-new');
    Route::get('/combo/{slug}', [App\Http\Controllers\ComboController::class, 'show'])->name('detail-combo');
    Route::get('/gio-hang', [App\Http\Controllers\OrderController::class, 'cart'])->name('cart');
    Route::get('/thanh-toan', [App\Http\Controllers\OrderController::class, 'orderCreate'])->name('checkout');
    Route::post('/thanh-toan', [App\Http\Controllers\OrderController::class, 'orderStore'])->name('checkout-store');
    Route::get('/chi-tiet-don-hang', [App\Http\Controllers\OrderController::class, 'orderReceived'])->name("order-received");
});

Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::post('/update-to-cart', [App\Http\Controllers\CartController::class, 'updateToCart']);

Route::group(['prefix' => 'bw-admin', 'middleware' => 'auth'], function () {

    Route::group(array('namespace' => 'Admin'), function() {

        // Route::post('/upload/post-image', 'PostTaskController@uploadImage')->name('upload-post-image');
        Route::post('/upload/post-tinymce-image', [PostTaskController::class, 'uploadTinyMCEImage'])->name('upload-post-image');

        Route::get('/', [DashboardController::class, 'index'])->name('manage');

        // Banner
        Route::group(['prefix' => 'banner'], function () {
            Route::get('/', [BannerController::class, 'index'])->name('list-banner');
            Route::get('create', [BannerController::class, 'create'])->name('create-banner');
            Route::post('store', [BannerController::class, 'store'])->name('store-banner');
            Route::get('edit/{id}', [BannerController::class, 'edit'])->name('edit-banner');
            Route::put('update/{id}', [BannerController::class, 'update'])->name('update-banner');
            Route::get('delete-row', [BannerController::class, 'delete'])->name('delete-banner');
            Route::get('change-status', [BannerController::class, 'changeStatus'])->name('change-banner-status');
        });

        // Country
        Route::get('country', [CountryController::class, 'index'])->name('list-country');
        Route::get('country/create', [CountryController::class, 'create'])->name('create-country');
        Route::post('country/store', [CountryController::class, 'store'])->name('store-country');
        Route::get('country/edit/{id}', [CountryController::class, 'edit'])->name('edit-country');
        Route::put('country/update/{id}', [CountryController::class, 'update'])->name('update-country');
        Route::get('country/delete-row', [CountryController::class, 'delete'])->name('delete-country');
        Route::get('country/change-status', [CountryController::class, 'changeStatus'])->name('change-country-status');

        // Region
        Route::get('region', [RegionController::class, 'index'])->name('list-region');
        Route::get('region/create', [RegionController::class, 'create'])->name('create-region');
        Route::post('region/store', [RegionController::class, 'store'])->name('store-region');
        Route::get('region/edit/{id}', [RegionController::class, 'edit'])->name('edit-region');
        Route::put('region/update/{id}', [RegionController::class, 'update'])->name('update-region');
        Route::get('region/delete-row', [RegionController::class, 'delete'])->name('delete-region');
        Route::get('region/change-status', [RegionController::class, 'changeStatus'])->name('change-region-status');
        Route::get('region/get-by-country', [RegionController::class, 'getByCountry'])->name('get-by-country');

        // Type
        Route::get('type', [TypeController::class, 'index'])->name('list-type');
        Route::get('type/create', [TypeController::class, 'create'])->name('create-type');
        Route::post('type/store', [TypeController::class, 'store'])->name('store-type');
        Route::get('type/edit/{id}', [TypeController::class, 'edit'])->name('edit-type');
        Route::put('type/update/{id}', [TypeController::class, 'update'])->name('update-type');
        Route::get('type/delete-row', [TypeController::class, 'delete'])->name('delete-type');
        Route::get('type/change-status', [TypeController::class, 'changeStatus'])->name('change-type-status');

        // Grape
        Route::get('grape', [GrapeController::class, 'index'])->name('list-grape');
        Route::get('grape/create', [GrapeController::class, 'create'])->name('create-grape');
        Route::post('grape/store', [GrapeController::class, 'store'])->name('store-grape');
        Route::get('grape/edit/{id}', [GrapeController::class, 'edit'])->name('edit-grape');
        Route::put('grape/update/{id}', [GrapeController::class, 'update'])->name('update-grape');
        Route::get('grape/delete-row', [GrapeController::class, 'delete'])->name('delete-grape');
        Route::get('grape/change-status', [GrapeController::class, 'changeStatus'])->name('change-grape-status');

        // Product
        Route::get('product', [ProductController::class, 'index'])->name('list-product');
        Route::get('product/create', [ProductController::class, 'create'])->name('create-product');
        Route::post('product/store', [ProductController::class, 'store'])->name('store-product');
        Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('edit-product');
        Route::put('product/update/{id}', [ProductController::class, 'update'])->name('update-product');
        Route::get('product/delete-row', [ProductController::class, 'delete'])->name('delete-product');
        Route::get('product/change-status', [ProductController::class, 'changeStatus'])->name('change-product-status');

        // Combo
        Route::get('combo', [ComboController::class, 'index'])->name('list-combo');
        Route::get('combo/create', [ComboController::class, 'create'])->name('create-combo');
        Route::post('combo/store', [ComboController::class, 'store'])->name('store-combo');
        Route::get('combo/edit/{id}', [ComboController::class, 'edit'])->name('edit-combo');
        Route::put('combo/update/{id}', [ComboController::class, 'update'])->name('update-combo');
        Route::get('combo/delete-row', [ComboController::class, 'delete'])->name('delete-combo');
        Route::get('combo/change-status', [ComboController::class, 'changeStatus'])->name('change-combo-status');
        Route::get('combo/get-products', [ComboController::class, 'getProducts'])->name('get-products');
        Route::get('combo/get-unselected-products', [ComboController::class, 'getUnselectedProducts'])->name('get-unselected-products');
        Route::post('combo/change-products', [ComboController::class, 'changeProducts'])->name('change-products');
        Route::post('combo/add-product', [ComboController::class, 'addProduct'])->name('add-product');

        // Accessory category
        Route::group(['prefix' => 'accessory-category'], function () {
            Route::get('/', [AccessoryCategoryController::class, 'index'])->name('list-accessory-category');
            Route::get('create', [AccessoryCategoryController::class, 'create'])->name('create-accessory-category');
            Route::post('store', [AccessoryCategoryController::class, 'store'])->name('store-accessory-category');
            Route::get('edit/{id}', [AccessoryCategoryController::class, 'edit'])->name('edit-accessory-category');
            Route::put('update/{id}', [AccessoryCategoryController::class, 'update'])->name('update-accessory-category');
            Route::get('delete-row', [AccessoryCategoryController::class, 'delete'])->name('delete-accessory-category');
            Route::get('change-status', [AccessoryCategoryController::class, 'changeStatus'])->name('change-accessory-category-status');
        });

        // Accessories
        Route::group(['prefix' => 'accessory'], function () {
            Route::get('/', [AccessoryController::class, 'index'])->name('list-accessory');
            Route::get('create', [AccessoryController::class, 'create'])->name('create-accessory');
            Route::post('store', [AccessoryController::class, 'store'])->name('store-accessory');
            Route::get('edit/{id}', [AccessoryController::class, 'edit'])->name('edit-accessory');
            Route::put('update/{id}', [AccessoryController::class, 'update'])->name('update-accessory');
            Route::get('delete-row', [AccessoryController::class, 'delete'])->name('delete-accessory');
            Route::get('change-status', [AccessoryController::class, 'changeStatus'])->name('change-accessory-status');
        });

        // News
        Route::group(['prefix' => 'news'], function () {
            Route::get('/', [NewsController::class, 'index'])->name('list-news');
            Route::get('create', [NewsController::class, 'create'])->name('create-news');
            Route::post('store', [NewsController::class, 'store'])->name('store-news');
            Route::get('edit/{id}', [NewsController::class, 'edit'])->name('edit-news');
            Route::put('update/{id}', [NewsController::class, 'update'])->name('update-news');
            Route::get('delete-row', [NewsController::class, 'delete'])->name('delete-news');
            Route::get('change-status', [NewsController::class, 'changeStatus'])->name('change-news-status');
        });

        // Knowledge category
        Route::group(['prefix' => 'knowledge-category'], function () {
            Route::get('/', [KnowledgeCategoryController::class, 'index'])->name('list-knowledge-category');
            Route::get('create', [KnowledgeCategoryController::class, 'create'])->name('create-knowledge-category');
            Route::post('store', [KnowledgeCategoryController::class, 'store'])->name('store-knowledge-category');
            Route::get('edit/{id}', [KnowledgeCategoryController::class, 'edit'])->name('edit-knowledge-category');
            Route::put('update/{id}', [KnowledgeCategoryController::class, 'update'])->name('update-knowledge-category');
            Route::get('delete-row', [KnowledgeCategoryController::class, 'delete'])->name('delete-knowledge-category');
            Route::get('change-status', [KnowledgeCategoryController::class, 'changeStatus'])->name('change-knowledge-category-status');
        });

        // Knowledge
        Route::group(['prefix' => 'knowledge'], function () {
            Route::get('/', [KnowledgeController::class, 'index'])->name('list-knowledge');
            Route::get('create', [KnowledgeController::class, 'create'])->name('create-knowledge');
            Route::post('store', [KnowledgeController::class, 'store'])->name('store-knowledge');
            Route::get('edit/{id}', [KnowledgeController::class, 'edit'])->name('edit-knowledge');
            Route::put('update/{id}', [KnowledgeController::class, 'update'])->name('update-knowledge');
            Route::get('delete-row', [KnowledgeController::class, 'delete'])->name('delete-knowledge');
            Route::get('change-status', [KnowledgeController::class, 'changeStatus'])->name('change-knowledge-status');
        });

        // Promotion
        Route::group(['prefix' => 'promotion'], function () {
            Route::get('/', [PromotionController::class, 'index'])->name('list-promotion');
            Route::get('create', [PromotionController::class, 'create'])->name('create-promotion');
            Route::post('store', [PromotionController::class, 'store'])->name('store-promotion');
            Route::get('edit/{id}', [PromotionController::class, 'edit'])->name('edit-promotion');
            Route::put('update/{id}', [PromotionController::class, 'update'])->name('update-promotion');
            Route::get('delete-row', [PromotionController::class, 'delete'])->name('delete-promotion');
            Route::get('change-status', [PromotionController::class, 'changeStatus'])->name('change-promotion-status');
            Route::get('get-item-by-type', [PromotionController::class, 'getItemByType'])->name('get-item-by-type');
        });

        // Gift
        Route::group(['prefix' => 'gift'], function () {
            Route::get('/', [GiftController::class, 'index'])->name('list-gift');
            Route::get('create', [GiftController::class, 'create'])->name('create-gift');
            Route::post('store', [GiftController::class, 'store'])->name('store-gift');
            Route::get('edit/{id}', [GiftController::class, 'edit'])->name('edit-gift');
            Route::put('update/{id}', [GiftController::class, 'update'])->name('update-gift');
            Route::get('delete-row', [GiftController::class, 'delete'])->name('delete-gift');
            Route::get('change-status', [GiftController::class, 'changeStatus'])->name('change-gift-status');
        });

        // Information
        Route::group(['prefix' => 'information'], function () {
            Route::get('/', [InformationController::class, 'index'])->name('list-information');
            Route::get('create', [InformationController::class, 'create'])->name('create-information');
            Route::post('store', [InformationController::class, 'store'])->name('store-information');
            Route::get('edit/{id}', [InformationController::class, 'edit'])->name('edit-information');
            Route::put('update/{id}', [InformationController::class, 'update'])->name('update-information');
            Route::get('delete-row', [InformationController::class, 'delete'])->name('delete-information');
            Route::get('change-status', [InformationController::class, 'changeStatus'])->name('change-information-status');
        });

        // Order
        Route::group(['prefix' => 'order'], function () {
            Route::get('/', [OrderController::class, 'index'])->name('list-order');
            Route::get('detail/{id}', [OrderController::class, 'detail'])->name('detail-order');
            Route::get('change-status', [OrderController::class, 'changeStatus'])->name('change-order-status');
        });

        // Home block
        Route::group(['prefix' => 'home-block'], function () {
            Route::get('/', [HomeBlockController::class, 'index'])->name('list-home-block');
            Route::get('create', [HomeBlockController::class, 'create'])->name('create-home-block');
            Route::post('store', [HomeBlockController::class, 'store'])->name('store-home-block');
            Route::get('edit/{id}', [HomeBlockController::class, 'edit'])->name('edit-home-block');
            Route::put('update/{id}', [HomeBlockController::class, 'update'])->name('update-home-block');
            Route::get('delete-row', [HomeBlockController::class, 'delete'])->name('delete-home-block');
            Route::get('change-status', [HomeBlockController::class, 'changeStatus'])->name('change-home-block-status');
        });
    });
});

