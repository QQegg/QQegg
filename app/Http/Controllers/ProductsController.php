<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Push;
use App\Store;
use App\User_push;
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
        $category = Category::all()->where('Store_id',$store['0']);
        return view('product.productlist', compact('product','category'));
    }

    public function create()
    {

    }


    public function store(Request $request)
    {

        $messsages = array(
            'name.required' => '你必須輸入產品名稱',
            'specification.required' => '你必須輸入產品規格',
            'price.required' => '你必須輸入單價',
            'price.integer' => '單價必須為數字',
            'C_name.required' => '你必須選擇產品類別',
            'picture.required' => '你必須選擇照片',
        );
        $rules = array(
            'name' => 'required|max:255',
            'specification' => 'required',
            'price' => 'required|integer',
            'C_name' => 'required',
            'picture' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messsages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $store = Store::all()->where('email', Auth::guard('store')->user()->email)->pluck('id');

        if ($request->hasFile('picture')) {
            $file_name = $request->file('picture')->getClientOriginalName();
            $destinationPath = '/public/product';
            $request->file('picture')->storeAs($destinationPath, $file_name);
            // save new image $file_name to database
            // $product->update(['picture' => $file_name]);

            Product::create([
                'Category_id' => $request['C_name'],
                'store_id' => $store['0'],
                'name' => $request['name'],
                'specification' => $request['specification'],
                'price' => $request['price'],
                'picture' => $file_name,
            ]);
        }
        return redirect()->route('prolist');
    }

    public function edit($id)
    {
        $product= Product::all()->where('id', $id);
        $category_name = Category::all()->where('id',$product->first()['Category_id'])->pluck('name');
        $product->first()['C_name'] = $category_name->first();
        $category = Category::all()->where('Store_id',Auth::guard()->user()->id)->whereNotIn('id',$product->first()['Category_id']);
        return view('product.productedit', compact('product','category'));
    }

    public function update(Request $request, $id)
    {
        $messsages = array(
            'name.required' => '你必須輸入產品名稱',
            'specification.required' => '你必須輸入產品規格',
            'price.required' => '你必須輸入單價',
            'price.integer' => '單價必須為數字',
            'picture.required' => '你必須選擇照片',
        );

        $rules = array(
            'name' => 'required|max:255',
            'specification' => 'required',
            'price' => 'required|integer',
            'picture' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messsages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $product = Product::find($id);

        if ($request->hasFile('picture')) {
            $file_name = $request->file('picture')->getClientOriginalName();

            $destinationPath = '/public/product';
            $request->file('picture')->storeAs($destinationPath, $file_name);

            $product->update([
                'Category_id' => $request['C_name'],
                'name' => $request['name'],
                'specification' => $request['specification'],
                'price' => $request['price'],
                'picture' => $file_name,
            ]);
        }

        return redirect()->route('prolist');
    }

    public function destroy($id)
    {
        $push = Push::find($id);
        $push->update([
            'Commodity_id' => 0,
        ]);
        $whereArray = array('id' => $id);
        DB::table('commoditys')->where($whereArray)->delete();
        return redirect()->route('prolist');
    }

    public function detail($id){
        $product = Product::all()->where('id',$id);
        $category_name = Category::all()->where('id',$product->first()['Category_id'])->pluck('name');
        $product->first()['C_name'] = $category_name->first();
        return view('product.productdetail',compact('product'));
    }
}
