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

        return view('managment.pushcreate');
    }
    public function store(Request $request)
    {
        Push::create($request->all());
        return redirect()->route('pushlist');
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function destroy($id)
    {
        Push::destroy($id);
        return redirect()->route('pushlist');
    }
}
