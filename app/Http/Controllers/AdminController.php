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
        $users = User::all();
        $products = Product::all();
        return view ('admin/index', compact('products', 'users'));
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

   
    public function customerAd()
    {
        $users = User::all();
        $data = array();
        if(Session::has('Email')){
            $data = User::where('userEmail','=', Session::get('Email'))->first();
        }
        return view ('admin/customer', compact('data','users'));
    }

   

    public function add()
    {
        $products = Product::all();
        return view('admin/add', compact('products'));
    }

    public function save(Request $request)
    {
        $pro = new Product();
        $pro->productId = $request->id;
        $pro->productName = $request->name;
        $pro->productPrice = $request->price;
        $pro->productImg = $request->image;
        $pro->save();
        return redirect()->back()->with('success','Product added successfully!');
    }

    public function edit($id)
    {
        
        $data = Product::where('productId','=',$id)->first();
        $products = Product::get();
        return view('admin/edit',compact('products'));
        
    }

    public function update(Request $request)
    {
        Product::where('productId', '=', $request->id)->update([
            'productName' => $request->name,
            'productPrice' => $request->price,
            'productImg' => $request->image,

        ]);
        return redirect()->back()->with('success','Product update successfully!');
    }

    public function delete($id)
    {
        Product::where('productId', '=',$id)->delete();
        return redirect()->back()->with('success','Product deleted successfully!');
    }

 



}
