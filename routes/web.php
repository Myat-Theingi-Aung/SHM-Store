<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('backend.dashboard');
});
Route::get('/create', function () {
    return view('backend.product.create');
});
Route::get('/edit', function () {
    return view('backend.product.edit');
});
Route::get('/show', function () {
    return view('backend.product.list');
});
