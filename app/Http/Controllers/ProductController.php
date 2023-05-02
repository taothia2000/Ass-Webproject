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
 
        //lấy giá trị của product
        $cart = session()->get('cart');
        $subtotals = [];  
        foreach($cart as $id => $details){
            $subtotals[$id] = $details['price'] * $details['quantity'];
        }

        //tính total từ các subtotal ở trên
        $total = array_sum($subtotals);

        //view cart
        return view ('customer/cart', compact('subtotals', 'total'));

    }

    public function addtocart($id)
    {
        $product = Product::find($id);
        $cart = session() -> get('cart');

        //lưu thông tin product 
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


    public function remove($id)
    {
        $cart = session()->get('cart');
    
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed successfully from cart.');
    }



}