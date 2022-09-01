<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Frontend\Cart\CartController;
use App\Http\Controllers\Backend\Order\OrderController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Profile\ProfileController;
use App\Http\Controllers\Backend\Feedback\FeedbackController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Frontend\Checkout\CheckoutController;
use App\Http\Controllers\Frontend\HomePage\HomePageController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Frontend\AboutPage\AboutPageController;
use App\Http\Controllers\Backend\Subscriber\SubscriberController;
use App\Http\Controllers\Frontend\ProductPage\ProductPageController;
use App\Http\Controllers\Frontend\FeedbackPage\FeedbackPageController;

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/',                   [HomePageController::class, 'showHomePage'])->name('home');
Route::get('/about',              [AboutPageController::class, 'showAboutPage'])->name('about');
Route::get('/product',            [ProductPageController::class, 'showProductPage'])->name('product');
Route::get('/product/{category}', [ProductPageController::class, 'showProductPageByCategory'])->name('product.category');
Route::get('/feedback',           [FeedbackPageController::class, 'showFeedbackPage'])->name('feedback');
Route::post('/feedback',          [FeedbackPageController::class, 'storeFeedback'])->name('feedback.store');

// Cart Module
Route::get('/cart',               [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/store',         [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/update',        [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/delete/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart/clear',         [CartController::class, 'clear'])->name('cart.clear');

// Subscriber
Route::post('/subscriber', [SubscriberController::class, 'store'])->name('subscriber.store');

Route::middleware('auth')->group(function () {
    Route::get('/checkout',  [CheckoutController::class, 'showCheckoutView'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'submitCheckoutView'])->name('checkout.submit');
});

Route::group(['middleware' => 'IsAdmin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Product             
    Route::get('/product',                 [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create',          [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/create',         [ProductController::class, 'store'])->name('product.store');
    Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/archive',         [ProductController::class, 'archive'])->name('product.archive');
    Route::get('/product/show/{id}',       [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/edit/{id}',       [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}',     [ProductController::class, 'update'])->name('product.update');
    Route::post('/product/import',         [ProductController::class, 'import'])->name('product.import');
    Route::get('/product/export',          [ProductController::class, 'export'])->name('product.export');

    //order
    Route::get('/order',                 [OrderController::class, 'index'])->name('order.index');
    Route::post('/order/status-update',  [OrderController::class, 'statusUpdate'])->name('order.statusUpdate');
    Route::get('/order/today-order',     [OrderController::class, 'todayOrder'])->name('order.todayOrder');
    Route::get('/order/pending-order',   [OrderController::class, 'pendingOrder'])->name('order.pendingOrder');
    Route::get('/order/completed-order', [OrderController::class, 'completedOrder'])->name('order.completedOrder');
    Route::get('/order/show/{id}',       [OrderController::class, 'orderDeatils'])->name('order.show');
    Route::delete('/order/destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

    // Category
    Route::get('/category',                [CategoryController::class, 'showCategoryList'])->name('category.index');
    Route::get('/category/create',         [CategoryController::class, 'showCreateCategoryView'])->name('category.create');
    Route::post('/category/create',        [CategoryController::class, 'submitCreateCategoryView'])->name('category.store');
    Route::get('/category/edit/{id}',      [CategoryController::class, 'showEditCategoryView'])->name('category.edit');
    Route::post('/category/edit/{id}',     [CategoryController::class, 'submitEditCategoryView'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');

    // User
    Route::get('/user',                [UserController::class, 'showUserList'])->name('user.index');
    Route::get('/user/create',         [UserController::class, 'showCreateUserView'])->name('user.create');
    Route::post('/user/create',        [UserController::class, 'submitCreateUserView'])->name('user.store');
    Route::get('/user/edit/{id}',      [UserController::class, 'showEditUserView'])->name('user.edit');
    Route::post('/user/edit/{id}',     [UserController::class, 'submitEditUserView'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');

    // Feedback
    Route::get('/feedback',                [FeedbackController::class, 'showFeedbackList'])->name('feedback.index');
    Route::delete('/feedback/delete/{id}', [FeedbackController::class, 'deleteFeedback'])->name('feedback.delete');

    // Profile 
    Route::get('/profile',          [ProfileController::class, 'showUserProfile'])->name('user.profile');
    Route::get('/profile/edit',     [ProfileController::class, 'showEditProfileView'])->name('user.profile-edit');
    Route::post('/profile/update',  [ProfileController::class, 'submitEditProfileView'])->name('user.profile-update');
    Route::post('/password-update', [ProfileController::class, 'updateUserPassword'])->name('user.password-update');

    // Subscriber
    Route::get('/subscriber',                [SubscriberController::class, 'index'])->name('subscriber.index');
    Route::delete('/subscriber/delete/{id}', [SubscriberController::class, 'delete'])->name('subscriber.delete');
});