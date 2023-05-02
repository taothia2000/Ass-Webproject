<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
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


    public function checkout(Request $request)
    {
        $cart = session()->get('cart');

        foreach($cart as $id => $details){
            $order = new Order();
            $order->productId = $id;
            $order->quantity = $details['quantity'];
            $order->save();
        }
    
        session()->forget('cart');
    
        return redirect()->route('cart.index')->with('success', 'Your order has been placed!');
    }


}