<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class . '@index');
Route::get('/register',RegisterController::class. '@index');
Route::post('/register', RegisterController::class . '@register');
Route::get('/login', SupplierController::class . '@index');
Route::post('/login', SupplierController::class . '@login');
Route::get('/logout', SupplierController::class . '@logout');
Route::get('/admin', AdminController::class . '@index');

