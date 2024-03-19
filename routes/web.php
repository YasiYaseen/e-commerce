<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomePageController::class,'home'])->name('user.home');
Route::get('/homi',[HomePageController::class,'home'])->name('user.home');
