<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\frontend\FrontendPageController;
use App\Http\Controllers\frontend\user\WishlistController;

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [FrontendPageController::class, 'home'])->name('home');

Route::get('/subcategory/{id}/{slug}',[FrontendPageController::class, 'ShowSubcategory'])->name('subcategory');

Route::get('/subcategory-product/{id}/{slug}', [FrontendPageController::class,'SubCatproduct'])->name('sub-category-product');

Route::get('/product/details/{id}/{slug}', [FrontendPageController::class,'ProductDetails'])->name('product.details');

// Add cart
Route::post('/cart/data/store/{id}', [CartController::class,'addToCart'])->name('productaddToCart');

Route::get('/product/mini/cart', [CartController::class,'getMiniCart'])->name('getMiniCartProduct');

Route::get('/minicart/product-remove/{rowId}', [CartController::class,'removeMiniCart'])->name('removeMiniCartProduct');

// AJAX Product data route
Route::get('/product/view/modal/{id}',[FrontendPageController::class,'productviewAjax'])->name('productModalview');

//Wishlist routes
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    Route::post('/add/product/to-wishlist/{product_id}',[WishlistController::class,'addToWishlist'])->name('addtoWishlist');

    Route::get('count-wishlist',[WishlistController::class,'Countwishlist'])->name('countWishlist');
});



Route::group(['prefix'=>'admin', 'middleware' => 'auth:admin'], function(){
	Route::get('dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');

    Route::resource('category', CategoryController::class);
    Route::resource('sub-category', SubCategoryController::class);
    Route::resource('product', ProductController::class);
    
    // ajax route
    Route::get('/category/subcategory/ajax/{category_id}', [ProductController::class, 'getSubCategory']);

    // change product status
    Route::get('/changestatus', [ProductController::class, 'changeStatus'])->name('change-product-status');

    // update multi-image route
    Route::post('/products/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');

    //slider
    Route::resource('slider', SliderController::class);
});