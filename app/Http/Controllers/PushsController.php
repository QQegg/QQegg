<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Push;
use App\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use LaravelFCM\Message\Topics;
use LaravelFCM\Message\PayloadNotificationBuilder;

class PushsController extends Controller
{
    public function index()
    {
        $store = Store::all()->where('email' ,  Auth::guard('store')->user()->email)->pluck('id');
        $pushs=Push::all()->where('Store_id', $store['0']);
        foreach ($pushs as &$info)
        {
            if($info['statue']==1){
                $info['statue']='已推播';
            }
            else{
                $info['statue']='未推播';
            }
        }
        return view('managment.push',compact('pushs'));
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
        $messsages = array(
            'title.required'=>'你必須輸入促銷訊息名稱',
            'content.required'=>'你必須輸入促銷訊息內容',
            'picture.required'=>'你必須上傳圖片',
            'date_start.required'=>'你必須輸入起始日期',
            'date_end.required'=>'你必須輸入結束日期',
            'time_start.required'=>'你必須輸入起始時間',
            'time_end.required'=>'你必須輸入時間',
        );
        $rules = array(
            'title' => 'required',
            'content' => 'required',
            'picture' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',

        );

        $validator = Validator::make($request->all(), $rules,$messsages);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }

        $store = Store::all()->where('email' ,  Auth::guard('store')->user()->email)->pluck('id');

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
                'date_start' => $request['date_start'],
                'date_end' => $request['date_end'],
                'time_start' => $request['time_start'],
                'time_end' => $request['time_end'],
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
    public function changestatue($id){
        $push=Push::all()->where('id',$id)->first();
        if($push['statue']==0){
            $push->update([
                'statue'=>1
            ]);

        }
        else{
            $push->update([
                'statue'=>0
            ]);
        }
        return redirect()->route('pushlist');
    }
    public function push(){

        $notificationBuilder = new PayloadNotificationBuilder('my title');
        $notificationBuilder->setBody('Hello world')
            ->setSound('default');
        $notification = $notificationBuilder->build();
        $topic = new Topics();
        $topic->topic('news');
        $topicResponse = FCM::sendToTopic($topic, null, $notification, null);
        $topicResponse->isSuccess();
        $topicResponse->shouldRetry();
        $topicResponse->error();

    }
}
