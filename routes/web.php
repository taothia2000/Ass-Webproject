<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', [ProductController::class,'index']);
Route::get('add', [ProductController::class,'add']);
Route::post('save', [ProductController::class,'save']);
Route::get('edit/{id}', [ProductController::class,'edit']);
Route::post('update', [ProductController::class,'update']);
Route::get('delete/{id}', [ProductController::class,'delete']);
