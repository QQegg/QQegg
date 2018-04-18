<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('guest:admin',['except' => ['logout']]);
    }

    //function to show store login form
    public function showLoginForm() {
        return view('admin.admin-login');
    }
    //function to login stores
    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //attempt to login the stores in 判斷店家是否有使用權(0=false)，1=true
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ], $request->remember)){
            //if successful redirect to stores dashboard
            return redirect()->intended(route('admin.index'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email','remember'))->with('error','無此帳號或此帳號已被停權！若有任何問題，請與您的管理員聯絡！');

    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
