<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view ('customer/welcome', compact('products'));
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


    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
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