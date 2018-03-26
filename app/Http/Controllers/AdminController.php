<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }
    public function Show(){
        $accounts=Store::all();
        return view('admin.admin-store',compact('accounts'));
    }

    public function update(Request $request)
    {
        $fix = Store::find($request->id);
        $fix->right=true;
        $fix->save();
        $accounts = Store::all()->where('id',$request->id);
        return back()->with('success','修改成功',compact('accounts'));
    }
    public function destroy($id)
    {
        Store::destroy($id);
        return redirect()->route('admin.admin-store');
    }
}
