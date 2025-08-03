<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeBlockController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostTaskController;
use App\Http\Controllers\Admin\KnowledgeCategoryController;
use App\Http\Controllers\Admin\KnowledgeController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductColorImageController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductFeatureController;
use App\Http\Controllers\Admin\ProductNoteController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\GuaranteeInfoController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\QAController;
use App\Http\Controllers\Admin\FormSafeController;
use App\Http\Controllers\Admin\FormWarrantyController;
use App\Http\Controllers\Admin\FormContactsController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TypeController;
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
    Route::get('/san-pham/{category_slug?}', [App\Http\Controllers\ProductController::class, 'list'])->name('product-list');
    Route::get('/loai-san-pham/{slug}', [App\Http\Controllers\ProductController::class, 'productByType'])->name('loai-san-pham');
   Route::get('/chi-tiet-san-pham/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('product-index');
   Route::get('/giơi-thieu', [App\Http\Controllers\AboutController::class, 'show'])->name('about-show');
//   Route::get('/bao-hanh-12-nam', [App\Http\Controllers\HomeController::class, 'baoHanh12Nam'])->name('bao-hanh-12-nam');
   Route::get('/bao-hanh/{view}', [App\Http\Controllers\HomeController::class, 'baoHanh'])->name('bao-hanh');


    Route::get('lien-he', [App\Http\Controllers\ContactController::class, 'show'])->name('contact');
    Route::post('lien-he', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
    Route::get('/tim-kiem', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    Route::get('/tin-tuc', [App\Http\Controllers\NewController::class, 'list'])->name('news');
//    Route::get('/kien-thuc', [App\Http\Controllers\KnowledgeController::class, 'categories'])->name('category-list-knowledge');
    Route::get('/kien-thuc/{category?}', [App\Http\Controllers\KnowledgeController::class, 'list'])->name('category-detail-knowledge');
    Route::get('/kien-thuc/{category}/{slug}', [App\Http\Controllers\KnowledgeController::class, 'show'])->name('detail-knowledge');
    Route::get('/san-pham/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('san-pham');
    Route::get('/tin-tuc/{slug}', [App\Http\Controllers\NewController::class, 'show'])->name('detail-new');
    Route::get('/gio-hang', [App\Http\Controllers\OrderController::class, 'cart'])->name('cart');
    Route::get('/thanh-toan', [App\Http\Controllers\OrderController::class, 'orderCreate'])->name('checkout');
    Route::post('/thanh-toan', [App\Http\Controllers\OrderController::class, 'orderStore'])->name('checkout-store');
    Route::get('/chi-tiet-don-hang', [App\Http\Controllers\OrderController::class, 'orderReceived'])->name("order-received");
    Route::post('formsafe/store', [FormSafeController::class, 'store'])->name('store-formsafe');
    Route::post('formwarranty/store', [FormWarrantyController::class, 'store'])->name('store-formwarranty');
});

Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::post('/update-to-cart', [App\Http\Controllers\CartController::class, 'updateToCart']);
Route::get('/quick-add/{productId}', [App\Http\Controllers\CartController::class, 'getQuickAdd']);

Route::group(['prefix' => 'br-admin', 'middleware' => 'auth'], function () {

    Route::group(array('namespace' => 'Admin'), function() {

        // Route::post('/upload/post-image', 'PostTaskController@uploadImage')->name('upload-post-image');
        Route::post('/upload/post-tinymce-image', [PostTaskController::class, 'uploadTinyMCEImage'])->name('upload-post-image');

        Route::get('/', [DashboardController::class, 'index'])->name('manage');

        // Menu
        Route::group(['prefix' => 'menu'], function () {
            Route::get('/', [MenuController::class, 'index'])->name('list-menu');
            Route::get('create', [MenuController::class, 'create'])->name('create-menu');
            Route::post('store', [MenuController::class, 'store'])->name('store-menu');
            Route::get('edit/{id}', [MenuController::class, 'edit'])->name('edit-menu');
            Route::put('update/{id}', [MenuController::class, 'update'])->name('update-menu');
            Route::get('delete-row', [MenuController::class, 'delete'])->name('delete-menu');
            Route::get('change-status', [MenuController::class, 'changeStatus'])->name('change-menu-status');
            Route::get('sort', [MenuController::class, 'sort'])->name('sort-menu');
        });

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

        // Type
        Route::group(['prefix' => 'type'], function () {
            Route::get('/', [TypeController::class, 'index'])->name('list-type');
            Route::get('create', [TypeController::class, 'create'])->name('create-type');
            Route::post('store', [TypeController::class, 'store'])->name('store-type');
            Route::get('edit/{id}', [TypeController::class, 'edit'])->name('edit-type');
            Route::put('update/{id}', [TypeController::class, 'update'])->name('update-type');
            Route::get('delete-row', [TypeController::class, 'delete'])->name('delete-type');
            Route::get('change-status', [TypeController::class, 'changeStatus'])->name('change-type-status');
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
        Route::get('product/sort', [ProductController::class, 'sort'])->name('sort-product');


        // Product color image
        Route::get('product-color-image', [ProductColorImageController::class, 'index'])->name('list-product-color-image');
        Route::get('product-color-image/create', [ProductColorImageController::class, 'create'])->name('create-product-color-image');
        Route::post('product-color-image/store', [ProductColorImageController::class, 'store'])->name('store-product-color-image');
        Route::get('product-color-image/edit/{id}', [ProductColorImageController::class, 'edit'])->name('edit-product-color-image');
        Route::put('product-color-image/update/{id}', [ProductColorImageController::class, 'update'])->name('update-product-color-image');
        Route::get('product-color-image/delete-row', [ProductColorImageController::class, 'delete'])->name('delete-product-color-image');
        Route::get('product-color-image/change-status', [ProductColorImageController::class, 'changeStatus'])->name('change-product-color-image-status');
        Route::get('product-color-image/get-colors-by-product', [ProductColorImageController::class, 'getColorsByProduct'])->name('get-colors-by-product');

        // Product feature
        Route::get('product-feature', [ProductFeatureController::class, 'index'])->name('list-product-feature');
        Route::get('product-feature/create', [ProductFeatureController::class, 'create'])->name('create-product-feature');
        Route::post('product-feature/store', [ProductFeatureController::class, 'store'])->name('store-product-feature');
        Route::get('product-feature/edit/{id}', [ProductFeatureController::class, 'edit'])->name('edit-product-feature');
        Route::put('product-feature/update/{id}', [ProductFeatureController::class, 'update'])->name('update-product-feature');
        Route::get('product-feature/delete-row', [ProductFeatureController::class, 'delete'])->name('delete-product-feature');
        Route::get('product-feature/change-status', [ProductFeatureController::class, 'changeStatus'])->name('change-product-feature-status');
        Route::get('product-feature/get-feature-by-product', [ProductFeatureController::class, 'getFeatureByProduct'])->name('get-feature-by-product');
        Route::get('product-feature/get-feature-by-id', [ProductFeatureController::class, 'getFeatureById'])->name('get-feature-by-id');
        Route::get('product-feature/sort', [ProductFeatureController::class, 'sort'])->name('sort-product-feature');

        // Product note
        Route::get('product-note', [ProductNoteController::class, 'index'])->name('list-product-note');
        Route::get('product-note/create', [ProductNoteController::class, 'create'])->name('create-product-note');
        Route::post('product-note/store', [ProductNoteController::class, 'store'])->name('store-product-note');
        Route::get('product-note/edit/{id}', [ProductNoteController::class, 'edit'])->name('edit-product-note');
        Route::put('product-note/update/{id}', [ProductNoteController::class, 'update'])->name('update-product-note');
        Route::get('product-note/delete-row', [ProductNoteController::class, 'delete'])->name('delete-product-note');
        Route::get('product-note/change-status', [ProductNoteController::class, 'changeStatus'])->name('change-product-note-status');
        Route::get('product-note/get-note-by-product', [ProductNoteController::class, 'getNoteByProduct'])->name('get-note-by-product');


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

        // Post
        Route::group(['prefix' => 'post'], function () {
            Route::get('/', [PostController::class, 'index'])->name('list-post');
            Route::get('create', [PostController::class, 'create'])->name('create-post');
            Route::post('store', [PostController::class, 'store'])->name('store-post');
            Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit-post');
            Route::put('update/{id}', [PostController::class, 'update'])->name('update-post');
            Route::get('delete-row', [PostController::class, 'delete'])->name('delete-post');
            Route::get('change-status', [PostController::class, 'changeStatus'])->name('change-post-status');
        });

        // Post Category
        Route::group(['prefix' => 'post-category'], function () {
            Route::get('/', [PostCategoryController::class, 'index'])->name('list-post-category');
            Route::get('create', [PostCategoryController::class, 'create'])->name('create-post-category');
            Route::post('store', [PostCategoryController::class, 'store'])->name('store-post-category');
            Route::get('edit/{id}', [PostCategoryController::class, 'edit'])->name('edit-post-category');
            Route::put('update/{id}', [PostCategoryController::class, 'update'])->name('update-post-category');
            Route::get('delete-row', [PostCategoryController::class, 'delete'])->name('delete-post-category');
        });

        // Feature
        Route::group(['prefix' => 'feature'], function () {
            Route::get('/', [FeatureController::class, 'index'])->name('list-feature');
            Route::get('create', [FeatureController::class, 'create'])->name('create-feature');
            Route::post('store', [FeatureController::class, 'store'])->name('store-feature');
            Route::get('edit/{id}', [FeatureController::class, 'edit'])->name('edit-feature');
            Route::put('update/{id}', [FeatureController::class, 'update'])->name('update-feature');
            Route::get('delete-row', [FeatureController::class, 'delete'])->name('delete-feature');
            Route::get('change-status', [FeatureController::class, 'changeStatus'])->name('change-feature-status');
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

        // GuaranteeInfo
        Route::group(['prefix' => 'guarantee-info'], function () {
            Route::get('/', [GuaranteeInfoController::class, 'index'])->name('list-guarantee-info');
            Route::get('create', [GuaranteeInfoController::class, 'create'])->name('create-guarantee-info');
            Route::post('store', [GuaranteeInfoController::class, 'store'])->name('store-guarantee-info');
            Route::get('edit/{id}', [GuaranteeInfoController::class, 'edit'])->name('edit-guarantee-info');
            Route::put('update/{id}', [GuaranteeInfoController::class, 'update'])->name('update-guarantee-info');
            Route::get('delete-row', [GuaranteeInfoController::class, 'delete'])->name('delete-guarantee-info');
            Route::get('change-status', [GuaranteeInfoController::class, 'changeStatus'])->name('change-guarantee-info-status');
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

        // feedback
        Route::group(['prefix' => 'feedback'], function () {
            Route::get('/', [FeedbackController::class, 'index'])->name('list-feedback');
            Route::get('create', [FeedbackController::class, 'create'])->name('create-feedback');
            Route::post('store', [FeedbackController::class, 'store'])->name('store-feedback');
            Route::get('edit/{id}', [FeedbackController::class, 'edit'])->name('edit-feedback');
            Route::put('update/{id}', [FeedbackController::class, 'update'])->name('update-feedback');
            Route::get('delete-row', [FeedbackController::class, 'delete'])->name('delete-feedback');
            Route::get('change-status', [FeedbackController::class, 'changeStatus'])->name('change-feedback-status');
        });

        Route::get('qa', [QAController::class, 'index'])->name('list-qa');
        Route::get('qa/create', [QAController::class, 'create'])->name('create-qa');
        Route::post('qa/store', [QAController::class, 'store'])->name('store-qa');
        Route::get('qa/edit/{id}', [QAController::class, 'edit'])->name('edit-qa');
        Route::put('qa/update/{id}', [QAController::class, 'update'])->name('update-qa');
        Route::get('qa/delete-row', [QAController::class, 'delete'])->name('delete-qa');
        Route::get('qa/change-status', [QAController::class, 'changeStatus'])->name('change-qa-status');

        // FormSafe
        Route::get('formsafe', [FormSafeController::class, 'index'])->name('list-formsafe');
        Route::get('formsafe/show/{id}', [FormSafeController::class, 'show'])->name('show-formsafe');
        Route::get('formsafe/delete-row', [FormSafeController::class, 'delete'])->name('delete-formsafe');

        // FormSafe
        Route::get('formwarranty', [FormWarrantyController::class, 'index'])->name('list-formwarranty');
        Route::get('formwarranty/show/{id}', [FormWarrantyController::class, 'show'])->name('show-formwarranty');
        Route::get('formwarranty/delete-row', [FormWarrantyController::class, 'delete'])->name('delete-formwarranty');

        // FormSafe
        Route::get('contacts', [FormContactsController::class, 'index'])->name('list-contacts');
        Route::get('contacts/show/{id}', [FormContactsController::class, 'show'])->name('show-contacts');
        Route::get('contacts/delete-row', [FormContactsController::class, 'delete'])->name('delete-contacts');
    });
});
