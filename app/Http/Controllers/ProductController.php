<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view ('customer/welcome');
    }

    public function cart()
    {
        return view ('customer/cart');
    }
}