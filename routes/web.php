<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProducatCategoryController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RecycleController;
use App\Http\Controllers\Admin\CuponController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\WishlistController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// <<===== WEBSITE ROUTE LIST ======>>
Route::get('/', [WebsiteController::class, 'index'])->name('website');
Route::get('shop', [WebsiteController::class, 'shop']);
Route::get('product', [WebsiteController::class, 'product']);
Route::get('blog', [WebsiteController::class, 'blog']);
Route::get('contact', [WebsiteController::class, 'contact']);
Route::get('about', [WebsiteController::class, 'about']);
Route::get('productview/{slug}', [WebsiteController::class, 'productview']);
Route::get('cartitem', [WebsiteController::class, 'cartitem']);
// <<===== WEBSITE USER-LOGIN ROUTE LIST ======>>
Route::get('website/login', [WebsiteController::class, 'login'])->name('user_login');
Route::get('user_login', [WebsiteController::class, 'login_access'])->name('user_login_access');
Route::get('user_register', [WebsiteController::class, 'register'])->name('user_register_access');

// <<===== CART ROUTE LIST ======>>
Route::group(['prefix' => 'cart'], function() {
    Route::get('/',[ CartController::class, 'index'])->name('cart.index');
    Route::get('/{slug}',[ CartController::class, 'store'])->name('cart.store');
    Route::get('/delete/{id}',[ CartController::class, 'destroy'])->name('cart.destroy');
});

// <<===== WISHLIST ROUTE LIST ======>>
Route::group(['prefix' => 'wishlist'], function() {
    Route::get('/',[ WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/{slug}',[ WishlistController::class, 'store'])->name('wishlist.store');
    Route::get('/delete/{id}',[ WishlistController::class, 'destroy'])->name('wishlist.destroy');
});
// <<===== ADMIN ROUTE LIST ======>>
Route::get('/dashboard', [AdminController::class, 'index']);
Route::get('/logout', [AdminController::class, 'logout']);

// <<===== USERCONTROLLER ROUTE LIST ======>>
Route::group(['prefix' => 'dashboard'], function(){

Route::post('user/submit', [UserController::class, 'insert']);
Route::post('user/update', [UserController::class, 'update']);
Route::get('user/add', [UserController::class, 'add']);
Route::get('user/all', [UserController::class, 'all']);
Route::get('user/view/{id}', [UserController::class, 'view']);
Route::get('user/edit/{id}', [UserController::class, 'edit']);
Route::get('user/softdelete/{id}', [UserController::class, 'softdelete']);
Route::get('user/restore', [UserController::class, 'restoredata'])->name('user.restore');
Route::get('user/restore/{id}', [UserController::class, 'restore']);
Route::get('user/delete/{id}', [UserController::class, 'delete']);
Route::get('user/tb', [UserController::class, 'tb']);

// <<===== ROLEROUTE LIST ======>>
Route::post('role/submit', [RoleController::class, 'insert']);
Route::post('role/update', [RoleController::class, 'update']);
Route::get('role/add', [RoleController::class, 'add']);
Route::get('role/all', [RoleController::class, 'all']);
Route::get('role/view/{id}', [RoleController::class, 'view']);
Route::get('role/edit/{id}', [RoleController::class, 'edit']);

// <<===== BANNER ROUTE LIST ======>>
Route::get('banner/all', [BannerController::class, 'all']);
Route::get('banner/add', [BannerController::class, 'add']);
Route::get('banner/edit/{ban_id}', [BannerController::class, 'edit']);
Route::get('banner/view/{ban_id}', [BannerController::class, 'view']);
Route::post('banner/submit', [BannerController::class, 'insert']);
Route::post('banner/update', [BannerController::class, 'update']);
Route::get('banner/softdelete/{ban_id}', [BannerController::class, 'softdelete']);
Route::get('banner/restore/{ban_id}', [BannerController::class, 'restore']);
Route::get('banner/restore', [BannerController::class, 'restoredata'])->name('banner.restore');
Route::get('banner/delete/{ban_id}', [BannerController::class, 'delete']);

// <<===== BRAND ROUTE LIST ======>>


    Route::group(['prefix' => 'brand'], function(){
        Route::get('add', [BrandController::class, 'add']);
        Route::post('submit', [BrandController::class, 'insert']);
        Route::post('update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('all', [BrandController::class, 'all'])->name('brand.all');
        Route::get('edit/{brand_id}', [BrandController::class, 'edit']);
        Route::get('view/{brand_id}', [BrandController::class, 'view']);
        Route::get('softdelete/{brand_id}', [BrandController::class, 'softdelete']);
        Route::get('restore', [BrandController::class, 'restore'])->name('brand.restore');
        Route::get('restoredata/{brand_id}', [BrandController::class, 'restoredata']);
        Route::get('delete/{brand_id}', [BrandController::class, 'delete']);
    });



// <<===== PARTNER ROUTE LIST ======>>
Route::get('partner/add', [PartnerController::class, 'add']);
Route::post('partner/submit', [PartnerController::class, 'insert']);
Route::post('partner/update/{id}', [PartnerController::class, 'update'])->name('partner.update');
Route::get('partner/all', [PartnerController::class, 'all'])->name('partner.all');
Route::get('partner/edit/{id}', [PartnerController::class, 'edit']);
Route::get('partner/view/{id}', [PartnerController::class, 'view']);
Route::get('partner/softdelete/{id}', [PartnerController::class, 'softdelete']);
Route::get('partner/restore', [PartnerController::class, 'restore'])->name('partner.restore');
Route::get('partner/restoredata/{id}', [PartnerController::class, 'restoredata']);
Route::get('partner/delete/{id}', [PartnerController::class, 'delete']);

// <<===== PRODUCT CATEGORY ROUTE LIST ======>>
Route::get('procatrgory/add', [ProducatCategoryController::class, 'add'])->name('procategory.add');
Route::post('procatrgory/submit', [ProducatCategoryController::class, 'insert']);
Route::post('procatrgory/update/{id}', [ProducatCategoryController::class, 'update'])->name('procategory.update');
Route::get('procatrgory/all', [ProducatCategoryController::class, 'all'])->name('procategory.all');
Route::get('procatrgory/edit/{id}', [ProducatCategoryController::class, 'edit']);
Route::get('procatrgory/view/{id}', [ProducatCategoryController::class, 'view']);
Route::get('procatrgory/softdelete/{id}', [ProducatCategoryController::class, 'softdelete']);
Route::get('procatrgory/restore', [ProducatCategoryController::class, 'restore'])->name('procategory.restore');
Route::get('procatrgory/restoredata/{id}', [ProducatCategoryController::class, 'restoredata']);
Route::get('procatrgory/delete/{id}', [ProducatCategoryController::class, 'delete']);


// <<===== MANAGER ROUTE  LIST ======>>
Route::get('manage/basic', [ManageController::class, 'basic'])->name('manage.basic.show');
Route::POST('manage/update', [ManageController::class, 'update'])->name('manage.basic.update');

Route::get('manage/contact', [ManageController::class, 'contact'])->name('manage.contact.show');
Route::POST('contact/update', [ManageController::class, 'contact_update'])->name('manage.contact.update');

Route::get('manage/social', [ManageController::class, 'social'])->name('manage.social.show');
Route::POST('social/update', [ManageController::class, 'social_update'])->name('manage.social.update');

// <<===== PRODUCT ROUTE  LIST ======>>
Route::get('product/add', [ProductController::class, 'add'])->name('product.add');
Route::POST('product/submit', [ProductController::class, 'insert'])->name('product.insert');
Route::get('product/all', [ProductController::class, 'all'])->name('product.all');
Route::get('product/view/{id}', [ProductController::class, 'view'])->name('product.view');
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::POST('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('product/softdelete/{id}', [ProductController::class, 'softdelete'])->name('product.softdelete');
Route::get('product/restore', [ProductController::class, 'restore'])->name('product.restore');
Route::get('product/restoredata/{id}', [ProductController::class, 'restoredata'])->name('product.restoredata');
Route::get('product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

// <<===== CUPON ROUTE  LIST ======>>
Route::get('cupon/add', [CuponController::class, 'add'])->name('cupon.add');
Route::POST('cupon/submit', [CuponController::class, 'store'])->name('cupon.insert');
Route::get('cupon/all', [CuponController::class, 'all'])->name('cupon.all');
Route::get('cupon/view/{id}', [CuponController::class, 'view'])->name('cupon.view');
Route::get('cupon/edit/{id}', [CuponController::class, 'edit'])->name('cupon.edit');
Route::POST('cupon/update/{id}', [CuponController::class, 'update'])->name('cupon.update');
Route::get('cupon/softdelete/{id}', [CuponController::class, 'softdelete'])->name('cupon.softdelete');
Route::get('cupon/restore', [CuponController::class, 'restore'])->name('cupon.restore');
Route::get('cupon/restoredata/{id}', [CuponController::class, 'restoredata'])->name('cupon.restoredata');
Route::get('cupon/delete/{id}', [CuponController::class, 'delete'])->name('cupon.delete');

// <<===== RECYLE ROUTE  LIST ======>>
Route::get('recycle', [RecycleController::class, 'index'])->name('recycle');


// Route::get('product/restore', [ProductController::class, 'restore'])->name('product.restore');


});
require __DIR__.'/auth.php';
