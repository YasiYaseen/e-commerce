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



Route::controller(ProductController::class)->group(function(){
Route::get('product-list','productList')->name('product.list');
Route::get('create-product', 'createProduct')->name('product.create');
Route::post('save-product', 'save')->name('product.save');
Route::get('delete-product/{id}','delete')->name('product.delete');
});
