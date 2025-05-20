<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class . '@index')->name('home.index');
Route::get('/register',RegisterController::class. '@index')->name('register.index');
Route::post('/register', RegisterController::class . '@register')->name('register.store');
Route::get('/login', SupplierController::class . '@index')->name('supplier.index');
Route::post('/login', SupplierController::class . '@login')->name('supplier.login');
Route::get('/logout', SupplierController::class . '@logout')->name('supplier.logout');
