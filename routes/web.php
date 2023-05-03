<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;

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
Route::get('index', [ProductController::class,'index']) -> name('home');

//ADMIN
Route::get('admin/index', [AdminController::class, 'index']) -> name('home');
Route::get('admin/delete', [AdminController::class, 'index']) -> name('delete');
Route::get('edit', [AdminController::class, 'edit']) -> name('edit');

//CART
Route::get('cart', [CartController::class,'cart']) -> name('cart');
Route::get('add-to-cart/{id}', [CartController::class,'addtocart']);
Route::get('cart/{id}', [CartController::class,'remove']) -> name('removefromcart');
Route::get('checkout/{id}', [CartController::class,'checkout']) -> name('checkout');

//USER
Route::get('login', [CustomerController::class,'login'])->name('login');
Route::post('register-user',[CustomerController::class,'registerUser'])->name('register-user');
Route::post('login-user',[CustomerController::class,'loginUser'])->name('login-user');
Route::get('logOut', [CustomerController::class,'logOut'])->name('logOut');
