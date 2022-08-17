<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;


Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/',     [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'IsAdmin', 'prefix' =>'admin', 'as' => 'admin.'], function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/product',function(){
        return view('admin.product.index');
    });
    
});


