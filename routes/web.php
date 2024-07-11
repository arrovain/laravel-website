<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('home');
});


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('products', ProductController::class);
});



Route::get('/admin', function () {
    return view('admin');
});

Auth::routes();


