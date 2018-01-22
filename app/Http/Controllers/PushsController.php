<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Push;
class PushsController extends Controller
{
    public function index()
    {
        $push=Push::all();
        $data=['pushs'=>$push];
        return view('managment.push',$data);
    }
    public function create()
    {
        $push=Push::all();
        $data=['pushs'=>$push];
        return view('managment.pushcreate',$data);
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
