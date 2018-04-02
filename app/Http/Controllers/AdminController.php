<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Input as input;

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
                return back()->with('success','您已開啟使用權 !');
                break;
            default:
                $fix->right=false;
                $fix->save();
                return back()->with('error','您已關閉使用權 !');
                break;
        }
        $accounts = Store::all()->where('id',$id);
        return view('admin.admin-store',compact('accounts'));
    }
    public function view($id)
    {
        $accounts=Store::all()->where('id',$id);
        $data=['stores'=>$accounts];
        return view('admin.admin-store-view',$data,compact('accounts'));
    }
    public function change_password($id)
    {
        $Store=Store::find($id);
        if(Hash::check(Input::get('passwordold'),$Store['password']) && Input::get('password') ==Input::get('password_confirmation')){
            $Store->password =bcrypt(Input::get('password'));
            $Store->save();
            return back()->with('success','修改成功');
        }
        else
            return back()->with('error','修改失敗');
    }
}
