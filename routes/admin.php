<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomePageController::class,'home'])->name('user.home');
Route::get('login',[AdminController::class,'login'])->name('login');
Route::post('do-login',[AdminController::class,'dologin'])->name('do.login');

Route::get('dashboard',[DashBoardController::class,'dashboard'])->name('dashboard');


