<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
    }
    public function create()
    {
        $product=Product::all();
        return view('product.productlist',compact('product'));
    }
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('procreate');
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function destroy()
    {
    }
}
