<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//HOMEPAGE
Route::get('index', [ProductController::class,'index']);

//ADMIN
Route::get('admin/login', [AdminController::class, 'login']) -> name('login');
Route::get('admin/index', [AdminController::class, 'index']) -> name('home');

//CART
Route::get('cart', [ProductController::class,'cart']) -> name('cart');
Route::get('add-to-cart/{id}', [ProductController::class,'addtocart']);
Route::get('cart/{id}', [ProductController::class,'remove']) -> name('removefromcart');


Route::get('login', [CustomerController::class,'login']);
Route::post('register-user',[CustomerController::class,'registerUser'])->name('register-user');
Route::post('login-user',[CustomerController::class,'loginUser'])->name('login-user');
