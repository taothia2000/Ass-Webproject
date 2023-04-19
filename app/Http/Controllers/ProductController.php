<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $data= Product::select('products.*', 'categories.catName')
                ->join('categories', 'products.catID', '=', 'categories.catID')
                ->get();
        return view('index', compact('data'));
    }

    
    /*
    public function add()
    {
        $category = Category::get();
        return view('add', compact('category'));
    }
    public function save(Request $REQUEST)
    {
        $pro = new Product();
        $pro->productID = $REQUEST->id;
        $pro->productName = $REQUEST->name;
        $pro->productPrice = $REQUEST->price;
        $pro->productDetails = $REQUEST->details;
        $pro->catId = $REQUEST->category;
        $pro->save();
        return redirect()->back()->with('success', 'Product added successfully');

    }
    public function edit($id)
    {
        $data = Product::where('productID','=',$id)->first();
        $category = Category::get();
        return view('edit', compact('category','data'));
    }
    public function update(Request $REQUEST)
    {
        Product::where('productID','=',$REQUEST->id)->update([
            'productName' => $REQUEST->name,
            'productPrice' => $REQUEST->price,
            'productImage' => $REQUEST->image,
            'productDetails' => $REQUEST->details,
            'catID'=> $REQUEST->category
        ]);
        return redirect()->back()->with('success', 'Product update successfully');

    }
    public function delete($id)
    {
        Product::where('productID','=',$REQUEST->id)->delete();
        return redirect()->back()->with('success', 'Product delete successfully');

    }
    */

}
