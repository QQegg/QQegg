<?php

namespace App\Http\Controllers;


use App\Product;
use App\Store;
use App\Category;
use update;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategorysController extends Controller
{

    public function index(){

        $store = Store::all()->where('email', Auth::guard('store')->user()->email)->pluck('id');

        $category = Category::all()->where('Store_id', $store['0']);

        return view('product.categorylist', compact('category'));
    }

    public function create(){
        return view('product.categorycreate');
    }

    public function store(Request $request){


        $store = Store::all()->where('email', Auth::guard('store')->user()->email)->pluck('id');

        $category_name = Category::all()->where('name', $request['name']);
        if (count($category_name) == 0) {
            Category::create([
                'store_id' => $store['0'],
                'name' => $request['name'],
            ]);
        }

        return redirect()->route('catecreate');
    }

    public function edit($id)
    {
        $category = Category::all()->where('id', $id);
        return view('product.categoryedit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $messsages = array(
            'C_name.required' => '你必須輸入類別名稱',
        );

        $rules = array(
            'C_name' => 'required|max:255',
        );

        $validator = Validator::make($request->all(), $rules, $messsages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $category = Category::find($id);

        $category->update([
                'name' => $request['C_name'],
            ]);

        return redirect()->route('catelist');
    }

    public function destroy($id)
    {
        $whereArray = array('id' => $id);
        $whereArray2 = array('Category_id' => $id);
        DB::table('categorys')->where($whereArray)->delete();
        DB::table('commoditys')->where($whereArray2)->update(['Category_id'=>'0']);
        return redirect()->route('catelist');
    }
}
