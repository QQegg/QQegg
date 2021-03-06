<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;
use App\Store;
use Auth;
use Hash;

class StoreChangeMemberController extends Controller
{
    public function password()
    {
        return view('store.store_change_password');
    }
    public function change_password()
    {
        $Store=Store::find(Auth::guard('store')->user()->id);
        if(Hash::check(Input::get('passwordold'),$Store['password']) && Input::get('password') ==Input::get('password_confirmation')){
            $Store->password =bcrypt(Input::get('password'));
            $Store->save();
            return back()->with('success','修改成功');
        }
        else
            return back()->with('error','修改失敗');
    }
    public function profile()
    {
        $store_picture = Store::all()->where('name',Auth::guard('store')->user()->name);
        return view('store.store_change_profile',compact('store_picture'));
    }
    public function update(Request $request)
    {
        $Store=Store::find(Auth::guard('store')->user()->id);
        if ($request->hasFile('picture')) {
            $file_name = $request->file('picture')->getClientOriginalName();
            $destinationPath = '/public/store';
            $request->file('picture')->storeAs($destinationPath, $file_name);
        }
        $Store->update($request->all());
        $Store->update([
            'picture' => $file_name,
            ]);
        return back()->with('success','修改成功');
    }
}
