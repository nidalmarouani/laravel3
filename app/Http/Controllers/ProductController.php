<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('w',['products' => $products, 'categories' => $categories]);
    }

    public function addProduct(Request $request)
    {
        //dd($request);
        Product::create($request->all());
        /*Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'name' => $request->name,
            'description' => $request->description,
            'unit_price' => $request->unit_price,
            'msrp' => $request->msrp,
            'color' => $request->color,
            'size' => $request->size,
            'category_id' => $request->category_id,
        ]);*/
        return redirect()->back();
    }
}
