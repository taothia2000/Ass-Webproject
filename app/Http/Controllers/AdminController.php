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
