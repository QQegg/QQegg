<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
class CouponsController extends Controller
{
    public function index()
    {
        $conpon=Coupon::all();
        $data=['conpons'=>$conpon];
        return view('managment.conpon',$data);
    }

    public function create()
    {

        return view('managment.conponcreate');
    }

    public function view($id)
    {
        $conpon=Coupon::all()->where('id',$id);
        $data=['conpons'=>$conpon];
        return view('managment.conponview',$data);
    }

    public function store(Request $request)
    {
        $conpon=Coupon::create($request->all());

        if ($request->hasFile('Coup_picture')) {
            $file_name = $request->file('Coup_picture')->getClientOriginalName();
            $destinationPath = '/public/conpon';
            $request->file('Coup_picture')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
            $conpon->update(['Coup_picture' => $file_name]);

        }
        return redirect()->route('conlist');
    }

    public function edit($id)
    {
        $conpon=Coupon::all()->where('id',$id);
        $data=['conpons'=>$conpon];
        return view('managment.conponedit',$data);
    }
    public function update(Request $request,$id)
    {
        $conpon=Coupon::find($id);
        $conpon->update($request->all());
        if ($request->hasFile('Coup_picture')){
            $file_name = $request->file('Coup_picture')->getClientOriginalName();

            $destinationPath = '/public/conpon';
            $request->file('Coup_picture')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
            $conpon->update(['Coup_picture' => $file_name]);

        }
        return redirect()->route('conlist');
    }
    public function destroy($id)
    {
        Coupon::destroy($id);
        return redirect()->route('conlist');
    }
}