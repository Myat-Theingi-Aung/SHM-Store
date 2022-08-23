<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/',     [HomeController::class, 'index'])->name('home');
Route::get('/about',     [HomeController::class, 'about'])->name('about');

Route::group(['middleware' => 'IsAdmin', 'prefix' =>'admin', 'as' => 'admin.'], function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    //product
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/create',[ProductController::class,'store'])->name('product.store');
    Route::delete('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');

    //category
    Route::get('/category', [CategoryController::class, 'showCategoryList'])->name('category.index');
    Route::get('/category/create',  [CategoryController::class, 'showCreateCategoryView'])->name('category.create');
    Route::post('/category/create',  [CategoryController::class, 'submitCreateCategoryView'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'showEditCategoryView'])->name('category.edit');
    Route::post('/category/edit/{id}',  [CategoryController::class, 'submitEditCategoryView'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
});








