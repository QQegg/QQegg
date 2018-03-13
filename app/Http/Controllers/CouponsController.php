<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class CouponsController extends Controller
{
    public function index()
    {
        $store = Store::all()->where('email' ,  Auth::guard('store')->user()->email)->pluck('id');
        $coupons=Coupon::all()->where('Store_id', $store['0']);
        return view('managment.coupon',compact('coupons'));
    }

    public function create()
    {

        return view('managment.couponcreate');
    }

    public function view($id)
    {
        $coupon=Coupon::all()->where('id',$id);
        $data=['coupons'=>$coupon];
        return view('managment.couponview',$data);
    }

    public function store(Request $request)
    {
        $messsages = array(
            'title.required'=>'你必須輸入折價券名稱',
            'content.required'=>'你必須輸入折價券內容',
            'start.required'=>'你必須輸入起始時間',
            'end.required'=>'你必須輸入結束時間',
            'discount.required'=>'你必須輸入折扣金額',
            'lowestprice.required'=>'你必須輸入至少購物金額',
            'picture.required'=>'你必須上傳圖片',
        );
        $rules = array(
            'title' => 'required',
            'content' => 'required',
            'start' => 'required',
            'end' => 'required',
            'discount' => 'required',
            'lowestprice' => 'required',
            'picture' => 'required',


        );

        $validator = Validator::make($request->all(), $rules,$messsages);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }
        $store = Store::all()->where('email' ,  Auth::guard('store')->user()->email)->pluck('id');


        if ($request->hasFile('picture')) {
            $file_name = $request->file('picture')->getClientOriginalName();
            $destinationPath = '/public/coupon';
            $request->file('picture')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
//            $coupon->update(['picture' => $file_name]);
            Coupon::create([
                'Store_id' => $store['0'],
                'title' => $request['title'],
                'content' => $request['content'],
                'start' => $request['start'],
                'end' => $request['end'],
                'discount' => $request['discount'],
                'lowestprice' => $request['lowestprice'],
                'picture' => $file_name,
            ]);
        }
        return redirect()->route('coulist');
    }

    public function edit($id)
    {
        $coupon=Coupon::all()->where('id',$id);
        $data=['coupons'=>$coupon];
        return view('managment.couponedit',$data);
    }
    public function update(Request $request,$id)
    {
        $coupon=Coupon::find($id);
        $coupon->update($request->all());
        if ($request->hasFile('picture')) {
            $file_name = $request->file('picture')->getClientOriginalName();
            $destinationPath = '/public/coupon';
            $request->file('picture')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
            $coupon->update(['picture' => $file_name]);

        }
        return redirect()->route('coulist');
    }
    public function destroy($id)
    {
        Coupon::destroy($id);
        return redirect()->route('coulist');
    }
}