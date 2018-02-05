<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
class CouponsController extends Controller
{
    public function index()
    {
        $coupon=Coupon::all();
        $data=['coupons'=>$coupon];
        return view('managment.coupon',$data);
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
        $coupon=Coupon::create($request->all());

        if ($request->hasFile('Coup_picture')) {
            $file_name = $request->file('Coup_picture')->getClientOriginalName();
            $destinationPath = '/public/coupon';
            $request->file('Coup_picture')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
            $coupon->update(['Coup_picture' => $file_name]);

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
        if ($request->hasFile('Coup_picture')){
            $file_name = $request->file('Coup_picture')->getClientOriginalName();

            $destinationPath = '/public/coupon';
            $request->file('Coup_picture')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
            $coupon->update(['Coup_picture' => $file_name]);

        }
        return redirect()->route('coulist');
    }
    public function destroy($id)
    {
        Coupon::destroy($id);
        return redirect()->route('coulist');
    }
}