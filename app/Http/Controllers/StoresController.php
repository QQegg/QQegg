<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoresController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:store');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('store.store_Dashboard');
    }
    public function create()
    {
    }
    public function store()
    {
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function destroy()
    {
    }
}
