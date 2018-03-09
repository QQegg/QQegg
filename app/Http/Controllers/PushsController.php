<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Push;
use App\Store;
use Illuminate\Support\Facades\Auth;
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
        $store_email=Auth::user();
        $store = Store::all()->where('account',$store_email['email'])->pluck('id');

        if ($request->hasFile('picture')) {
            $file_name = $request->file('picture')->getClientOriginalName();
            $destinationPath = '/public/push';
            $request->file('picture')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
//            $push->update(['picture' => $file_name]);

            Push::create([
                'Store_id' => $store['0'],
                'title' => $request['title'],
                'content' => $request['content'],
                'picture' => $file_name,
                'datetime' => $request['datetime'],
            ]);
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
        if ($request->hasFile('picture')) {
            $file_name = $request->file('picture')->getClientOriginalName();
            $destinationPath = '/public/push';
            $request->file('picture')->storeAs($destinationPath,$file_name);

            // save new image $file_name to database
            $push->update(['picture' => $file_name]);

        }
        return redirect()->route('pushlist');
    }
    public function destroy($id)
    {
        Push::destroy($id);
        return redirect()->route('pushlist');
    }
}
