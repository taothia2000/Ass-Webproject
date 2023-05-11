<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdCustomer;
use App\Http\Controllers\AdProduct;
use App\Http\Controllers\AdOrder;


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
Route::get('admin/index', [AdminController::class, 'index']) -> name('adminIndex');
Route::get('adminPage', [AdminController::class, 'adminPage']) -> name('adminPage');
Route::get('logOut', [AdminController::class,'logOut'])->name('logOut');

Route::get('admin/customer',[AdminController::class,'customerAd'])->name('customer');
Route::get('admin/index', [AdminController::class, 'index']) -> name('home');


//CRUD PRODUCTS
Route::get('admin/add', [ProductController::class, 'add'])->name('add');
Route::post('admin/save', [ProductController::class, 'save'])->name('save');
Route::get('admin/edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::post('admin/update', [ProductController::class, 'update'])->name('update');
Route::get('admin/delete/{id}',[ProductController::class, 'delete'])->name('delete');

//CART
Route::get('cart', [CartController::class,'cart']) -> name('cart');
Route::get('add-to-cart/{id}', [CartController::class,'addtocart']);
Route::get('cart/{id}', [CartController::class,'remove']) -> name('removefromcart');
Route::get('checkout/{id}', [CartController::class,'checkout']) -> name('checkout');

//Login&Register
Route::get('login', [CustomerController::class,'login'])->name('login');
Route::post('register-user',[CustomerController::class,'registerUser'])->name('register-user');
Route::post('login-user',[CustomerController::class,'loginUser'])->name('login-user');
Route::get('logOut', [CustomerController::class,'logOut'])->name('logOut');

//Customer
Route::get('Customer', [CustomerController::class,'Customer'])->name('Customer');
Route::post('Customer_data',[CustomerController::class,'Customer_data'])->name('Customer_data');



