<?php

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashBoardController::class,'dashboard'])->name('dashboard');
Route::get('login',[AdminController::class,'login'])->name('login');
Route::post('do-login',[AdminController::class,'dologin'])->name('do.login');

Route::get('dashboard',[DashBoardController::class,'dashboard'])->name('dashboard');
Route::get('product-list',[ProductController::class,'productList'])->name('product.list');



