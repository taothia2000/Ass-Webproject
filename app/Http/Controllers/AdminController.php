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

    public function adminPage()
    {
        $products = Product::all();
        $data = array();
        if(Session::has('Email')){
            $data = User::where('userEmail','=', Session::get('Email'))->first();
        }
        return view ('admin/welcome', compact('products','data'));
    }

    public function logOut(){
        if(Session::has('Email')){
            Session::pull('Email');
            return redirect('index');
        }
    }
   
}
