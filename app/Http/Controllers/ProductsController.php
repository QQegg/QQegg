<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $product=Product::all();
        return view('product.productlist',compact('product'));
    }
    public function create()
    {
        return view('product.productcreate');
    }
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('procreate');
    }
    public function edit()
    {
    }
    public function update(Request $request,$id)
    {

    }
    public function destroy()
    {
    }
}
