<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StoreLoginController extends Controller
{
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('guest:store',['except' => ['logout']]);
    }

    //function to show store login form
    public function showLoginForm() {
        return view('auth.store-login');
    }
    //function to login stores
    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //attempt to login the stores in
        if (Auth::guard('store')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //if successful redirect to stores dashboard
            return redirect()->intended(route('store.dashboard'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email','password'));
    }

    public function logout()
    {
        Auth::guard('store')->logout();

        return redirect('/');
    }
}
