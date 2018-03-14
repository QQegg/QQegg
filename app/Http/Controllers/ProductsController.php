<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\String_;

class ProductsController extends Controller
{
    public function index()
    {
        $store = Store::all()->where('email', Auth::guard('store')->user()->email)->pluck('id');

        $product = Product::all()->where('store_id', $store['0']);
        $cc = 0;
        foreach ($product as $count){
            $category_name = Category::all()->where('id',$count['Category_id'])->pluck('name');
            $product[$cc]['C_name']=$category_name[0];
            $cc++;
        }
        dd($product);

        return view('product.productlist', compact('product'));
    }

    public function create()
    {
        return view('product.productcreate');
    }


    public function store(Request $request)
    {

        $messsages = array(
            'name.required' => '你必須輸入產品名稱',
            'specification.required' => '你必須輸入產品規格',
            'price.required' => '你必須輸入單價',
            'unit.required' => '你必須輸入單位',
            'picture.required' => '你必須選擇照片',
        );
        $rules = array(
            'name' => 'required|max:255',
            'specification' => 'required',
            'price' => 'required|integer',
            'unit' => 'required|string',
            'picture' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messsages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $store = Store::all()->where('email', Auth::guard('store')->user()->email)->pluck('id');

        $category_name = Category::all()->where('name', $request['C_name']);

        if (count($category_name) == 0) {
            Category::create([
                'store_id' => $store['0'],
                'name' => $request['C_name'],
            ]);
        }

        $category_id = Category::all()->where('name', $request['C_name'])->pluck('id');

        if ($request->hasFile('picture')) {
            $file_name = $request->file('picture')->getClientOriginalName();
            $destinationPath = '/public/product';
            $request->file('picture')->storeAs($destinationPath, $file_name);
            // save new image $file_name to database
            // $product->update(['picture' => $file_name]);

            Product::create([
                'Category_id' => $category_id['0'],
                'store_id' => $store['0'],
                'name' => $request['name'],
                'specification' => $request['specification'],
                'price' => $request['price'],
                'unit' => $request['unit'],
                'picture' => $file_name,
            ]);
        }
        return redirect()->route('procreate');
    }

    public function edit($id)
    {
        $product = Product::all()->where('id', $id);
        $category_name = Category::all()->where('id',$product[0]['Category_id'])->pluck('name');
        $product[0]['C_name'] = $category_name['0'];
        return view('product.productedit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $messsages = array(
            'name.required' => '你必須輸入產品名稱',
            'specification.required' => '你必須輸入產品規格',
            'price.required' => '你必須輸入單價',
            'unit.required' => '你必須輸入單位',
            'picture.required' => '你必須選擇照片',
        );

        $rules = array(
            'name' => 'required|max:255',
            'specification' => 'required',
            'price' => 'required|integer',
            'unit' => 'required|string',
            'picture' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messsages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $store = Store::all()->where('email', Auth::guard('store')->user()->email)->pluck('id');

        $category_name = Category::all()->where('name', $request['C_name']);

        if (count($category_name) == 0) {
            Category::create([
                'store_id' => $store['0'],
                'name' => $request['C_name'],
            ]);
        }

        $product = Product::find($id);

        $category_id = Category::all()->where('name', $request['C_name'])->pluck('id');

        if ($request->hasFile('picture')) {
            $file_name = $request->file('picture')->getClientOriginalName();

            $destinationPath = '/public/product';
            $request->file('picture')->storeAs($destinationPath, $file_name);

            $product->update([
                'Category_id' => $category_id['0'],
                'name' => $request['name'],
                'specification' => $request['specification'],
                'price' => $request['price'],
                'unit' => $request['unit'],
                'picture' => $file_name,
            ]);
        }

        return redirect()->route('prolist');
    }

    public function destroy($id)
    {
        $whereArray = array('id' => $id);
        DB::table('commoditys')->where($whereArray)->delete();
        return redirect()->route('prolist');
    }
}
