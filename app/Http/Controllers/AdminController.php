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
    public function update($id)
    {
        $fix = Store::find($id);
        switch ($fix['right']){
            case '0':
                $fix->right=true;
                $fix->save();
                break;
            default:
                $fix->right=false;
                $fix->save();
                break;
        }
        $accounts = Store::all()->where('id',$id);
        return back()->with('success','修改成功',compact('accounts'));
    }
}
