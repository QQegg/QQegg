<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;
use App\User;
use Auth;
use Hash;

class UserChangeMemberController extends Controller
{
    public function password()
    {
        return view('user_change_password');
    }
    public function change_password()
    {
        $User=User::find(Auth::user()->id);
        if(Hash::check(Input::get('passwordold'),$User['password']) && Input::get('password') ==Input::get('password_confirmation')){
            $User->password =bcrypt(Input::get('password'));
            $User->save();
            return back()->with('success','修改成功');
        }
        else
            return back()->with('error','修改失敗');
    }
    public function profile()
    {
        return view('user_change_profile');
    }
    public function update(Request $request)
    {
        $User=User::find(Auth::user()->id);
        $User->update($request->all());
        return back()->with('success','修改成功');
    }
}
