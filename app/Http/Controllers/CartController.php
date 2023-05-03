<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Orders;
use App\Models\Order_Detail;

class CartController extends Controller
{
    public function cart()
    {
        $products = Product::all();

        //lấy giá trị của product
        $cart = session()->get('cart');
        $subtotals = [];  
        foreach($cart as $id => $details){
            $subtotals[$id] = $details['price'] * $details['quantity'];
        }

        //tính total từ các subtotal ở trên
        $total = array_sum($subtotals);

        //view cart
        return view ('customer/cart', compact('subtotals', 'total', 'products'));

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

        //đưa product vào session
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

        $products = Product::all();
        $productId = $request->input('productId');

        // Insert product and cart information into the 'orders' table
        $product = DB::table('products')->find($productId); // Replace 'products' table name with your own

      
        DB::table('order_detail')->insert(
            [
                'productName' => $product->productName

            ]
        );
        return view ('cart',compact('products')); 
    }




    
}
