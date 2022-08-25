<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Dashboard\DashboardController;

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/', [HomeController::class, 'showHomePage'])->name('home');
Route::get('/about', [HomeController::class, 'showAboutPage'])->name('about');
Route::get('/cart',     [HomeController::class, 'cart'])->name('cart');
Route::get('/feedback',     [HomeController::class, 'feedback'])->name('feedback');
Route::get('/product', [HomeController::class, 'showProductPage'])->name('product');
Route::get('/product/{category_id}', [HomeController::class, 'showProductPageByCategory'])->name('product.category');

// Cart Module
Route::get('/view-cart',        [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/add-to-cart',      [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/update-cart',      [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/remove-cart/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
Route::get('/clear-cart',       [CartController::class, 'clearCart'])->name('cart.clear');

Route::middleware('auth')->group(function(){
    Route::get('/checkout',  [CheckoutController::class, 'showCheckoutView'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'submitCheckoutView'])->name('checkout.submit');
});




Route::group(['middleware' => 'IsAdmin', 'prefix' =>'admin', 'as' => 'admin.'], function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    //product
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/create',[ProductController::class,'store'])->name('product.store');
    Route::delete('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/product/archive',[ProductController::class,'archive'])->name('product.archive');
    Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::post('/product/import',[ProductController::class,'import'])->name('product.import');
    Route::get('/product/export',[ProductController::class,'export'])->name('product.export');

    //category
    Route::get('/category', [CategoryController::class, 'showCategoryList'])->name('category.index');
    Route::get('/category/create',  [CategoryController::class, 'showCreateCategoryView'])->name('category.create');
    Route::post('/category/create',  [CategoryController::class, 'submitCreateCategoryView'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'showEditCategoryView'])->name('category.edit');
    Route::post('/category/edit/{id}',  [CategoryController::class, 'submitEditCategoryView'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');

    // User Module
    Route::get('/user',                [UserController::class, 'showUserList'])->name('user.index');
    Route::get('/user/create',         [UserController::class, 'showCreateUserView'])->name('user.create');
    Route::post('/user/create',        [UserController::class, 'submitCreateUserView'])->name('user.store');
    Route::get('/user/edit/{id}',      [UserController::class, 'showEditUserView'])->name('user.edit');
    Route::post('/user/edit/{id}',     [UserController::class, 'submitEditUserView'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');

    // Profile 
    Route::get('/profile', [ProfileController::class, 'showUserProfile'])->name('user.profile');
    Route::get('/profile/edit', [ProfileController::class, 'showEditProfileView'])->name('user.profile-edit');
    Route::post('/profile/update', [ProfileController::class, 'submitEditProfileView'])->name('user.profile-update');
    Route::post('/password-update', [ProfileController::class, 'updateUserPassword'])->name('user.password-update');

});
