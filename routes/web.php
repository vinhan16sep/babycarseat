<?php

use App\Http\Controllers\Admin\AccessoryCategoryController;
use App\Http\Controllers\Admin\AccessoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
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
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
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
    Route::get('/products/{category_slug?}', [App\Http\Controllers\ProductController::class, 'list'])->name('product-list');
//    Route::get('/products/detail/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('product-index');


    Route::get('lien-he', [App\Http\Controllers\ContactController::class, 'show'])->name('contact');
    Route::post('lien-he', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
    Route::get('ruou-vang', [App\Http\Controllers\ProductController::class, 'list'])->name('ruou-vang');
    Route::get('/tim-kiem', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    Route::get('/combo', [App\Http\Controllers\ComboController::class, 'list'])->name('combo');
    Route::get('/tin-tuc', [App\Http\Controllers\NewController::class, 'list'])->name('news');
//    Route::get('/kien-thuc', [App\Http\Controllers\KnowledgeController::class, 'categories'])->name('category-list-knowledge');
    Route::get('/kien-thuc/{category?}', [App\Http\Controllers\KnowledgeController::class, 'list'])->name('category-detail-knowledge');
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
Route::get('/quick-add/{productId}', [App\Http\Controllers\CartController::class, 'getQuickAdd']);

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

        // Product Category
        Route::group(['prefix' => 'product-category'], function () {
            Route::get('/', [ProductCategoryController::class, 'index'])->name('list-product-category');
            Route::get('create', [ProductCategoryController::class, 'create'])->name('create-product-category');
            Route::post('store', [ProductCategoryController::class, 'store'])->name('store-product-category');
            Route::get('edit/{id}', [ProductCategoryController::class, 'edit'])->name('edit-product-category');
            Route::put('update/{id}', [ProductCategoryController::class, 'update'])->name('update-product-category');
            Route::get('delete-row', [ProductCategoryController::class, 'delete'])->name('delete-product-category');
        });

        // Brand
        Route::group(['prefix' => 'brand'], function () {
            Route::get('/', [BrandController::class, 'index'])->name('list-brand');
            Route::get('create', [BrandController::class, 'create'])->name('create-brand');
            Route::post('store', [BrandController::class, 'store'])->name('store-brand');
            Route::get('edit/{id}', [BrandController::class, 'edit'])->name('edit-brand');
            Route::put('update/{id}', [BrandController::class, 'update'])->name('update-brand');
            Route::get('delete-row', [BrandController::class, 'delete'])->name('delete-brand');
        });

        // Color
        Route::group(['prefix' => 'color'], function () {
            Route::get('/', [ColorController::class, 'index'])->name('list-color');
            Route::get('create', [ColorController::class, 'create'])->name('create-color');
            Route::post('store', [ColorController::class, 'store'])->name('store-color');
            Route::get('edit/{id}', [ColorController::class, 'edit'])->name('edit-color');
            Route::put('update/{id}', [ColorController::class, 'update'])->name('update-color');
            Route::get('delete-row', [ColorController::class, 'delete'])->name('delete-color');
        });

        // Note
        Route::group(['prefix' => 'note'], function () {
            Route::get('/', [NoteController::class, 'index'])->name('list-note');
            Route::get('create', [NoteController::class, 'create'])->name('create-note');
            Route::post('store', [NoteController::class, 'store'])->name('store-note');
            Route::get('edit/{id}', [NoteController::class, 'edit'])->name('edit-note');
            Route::put('update/{id}', [NoteController::class, 'update'])->name('update-note');
            Route::get('delete-row', [NoteController::class, 'delete'])->name('delete-note');
        });

        // Product
        Route::get('product', [ProductController::class, 'index'])->name('list-product');
        Route::get('product/create', [ProductController::class, 'create'])->name('create-product');
        Route::post('product/store', [ProductController::class, 'store'])->name('store-product');
        Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('edit-product');
        Route::put('product/update/{id}', [ProductController::class, 'update'])->name('update-product');
        Route::get('product/delete-row', [ProductController::class, 'delete'])->name('delete-product');
        Route::get('product/change-status', [ProductController::class, 'changeStatus'])->name('change-product-status');


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
