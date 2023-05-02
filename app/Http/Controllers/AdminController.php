<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view ('admin/index', compact('products'));
    }

    public function login()
    {
        return view ('admin/login&register');
    }

   
}
