<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Dashboard\DashboardController;

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/',     [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'IsAdmin', 'prefix' =>'admin', 'as' => 'admin.'], function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    //product
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/create',[ProductController::class,'store'])->name('product.store');
    Route::delete('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
});


