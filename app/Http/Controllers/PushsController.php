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

    public function view($id)
    {
        $push=Push::all()->where('id',$id);
        $data=['pushs'=>$push];
        return view('managment.pushview',$data);
    }

    public function store(Request $request)
    {
        $push=Push::create($request->all());

        if ($request->hasFile('P_picture')) {
            $file_name = $request->file('P_picture')->getClientOriginalName();
            $destinationPath = '/public/push';
            $request->file('P_picture')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
            $push->update(['P_picture' => $file_name]);

        }
        return redirect()->route('pushlist');
    }

    public function edit($id)
    {
        $push=Push::all()->where('id',$id);
        $data=['pushs'=>$push];
        return view('managment.pushedit',$data);
    }
    public function update(Request $request,$id)
    {
        $push=Push::find($id);
        $push->update($request->all());
        if ($request->hasFile('P_picture')){
            $file_name = $request->file('P_picture')->getClientOriginalName();

            $destinationPath = '/public/push';
            $request->file('P_picture')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
            $push->update(['P_picture' => $file_name]);

        }
        return redirect()->route('pushlist');
    }
    public function destroy($id)
    {
        Push::destroy($id);
        return redirect()->route('pushlist');
    }
}
