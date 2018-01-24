<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $product = Product::create($request->all());


        if ($request->hasFile('Comm_img')) {
            $file_name = $request->file('Comm_img')->getClientOriginalName();
            $destinationPath = '/public';
            $request->file('Comm_img')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
            $product->update(['Comm_img' => $file_name]);
        }

        return redirect()->route('procreate');
    }
    public function edit($id)
    {
        $product=Product::all()->where('id',$id);
        return view('product.productedit',compact('product'));
    }
    public function update(Request $request,$id)
    {
        $product=Product::find($id);
        $product->update($request->all());
        return redirect()->route('prolist');
    }
    public function destroy($id)
    {
        $whereArray = array('id'=>$id);
        DB::table('commoditys')->where($whereArray)->delete();
        return redirect()->route('prolist');
    }
}
