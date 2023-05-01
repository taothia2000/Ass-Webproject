<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $data = array();
        if(Session::has('Email')){
            $data = User::where('userEmail','=', Session::get('Email'))->first();
        }
        return view ('customer/welcome', compact('products','data'));
    }

    public function cart()
    {
        return view ('customer/cart');
    }

    public function addtocart($id)
    {
        $product = Product::find($id);
        $cart = session() -> get('cart');

        //lấy thông tin product đc chọn
        $cart[$id] = [     
            "id" => $product->productId,                     
            "name" => $product->productName,
            "quantity" => 1,
            "price" => $product->productPrice,
            "img" => $product->productImg,
        ];

        //đưa product vào giỏ hàng
        session() -> put('cart', $cart);      
        return redirect() -> back() -> with('success', 'Product added to cart successfully!');
    }


    public function delete($id)
    {
        Cart::remove($id);
        return redirect() -> back() -> with('success', 'Product added to cart successfully!');

    }


    //xoá product trong database
    /*
    public function deleteindatabase($id)
    {
        Product::where('productId','=',$id) ->delete();
        return redirect() -> back() -> with('success', 'Product removed to cart successfully!');
    }
    */



}