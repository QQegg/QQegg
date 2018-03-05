<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
class NotificationsController extends Controller//這個是推播的基本架構 直接拿過去改
{
    public function index()
    {
        $push=Notification::all();
        $data=['pushs'=>$push];
        return view('notification.index',$data);
    }
    public function create()
    {
        return view('notification.creat');
    }
    public function store(Request $request)
    {
        Notification::create($request->all());
        $push=Notification::all();
        $data=['pushs'=>$push];
        return view('notification.index',$data);
    }
    public function edit($id)
    {
        $push = Notification::all()->where('id','=',$id);
        $data=['pushs'=>$push];
        return view('notification.edit')->with('push',$data);;
    }
    public function update(Request $request,$id)
    {
        $push=Notification::find($id);
        $push->update($request->all());
        return View('notification.index');
    }
    public function destroy($id)
    {
        Notification::destroy($id);
        $push=Notification::all();
        $data=['pushs'=>$push];
        return view('notification.index',$data);
    }

    //店家瀏覽頁面(暫時放在這之後要換到HomeController)
    public function all()
    {
        return view('all');
    }
}
