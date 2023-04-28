<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;


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

// Route::get('/', function () {

//     return view('login&register');
// });

Route::get('login', [CustomerController::class,'login']);
Route::post('register-user',[CustomerController::class,'registerUser'])->name('register-user');
Route::post('login-user',[CustomerController::class,'loginUser'])->name('login-user');
Route::get('dashboard',[CustomerController::class,'dashboard']);
