<?php

namespace App\Http\Controllers;

use App\Product;
use App\User_push;
use Commoditys;
use Illuminate\Http\Request;
use App\Push;
use App\Store;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Message\Topics;

class PushsController extends Controller
{
    public function index()
    {
        $store = Store::all()->where('email', Auth::guard('store')->user()->email)->pluck('id');
        $pushs2 = Push::all()->where('Store_id', $store['0']);


        $pushs = array();
        $pu=0;

        foreach ($pushs2 as $count){
            $pushs[$pu] = $count;
            $pu++;
        }


        $judgeCommodity_id = array();
        $judge = 0;
        foreach ($pushs as $count) {
            $judgeCommodity_id[$judge] = $count['Commodity_id'];
            $judge++;
        }

        $product = Product::all()->where('store_id', Auth::guard('store')->user()->id)->whereNotIn('id', $judgeCommodity_id);
        foreach ($pushs as &$info) {
            if ($info['statue'] == 1) {
                $info['statue'] = '已推播';
            } else {
                $info['statue'] = '未推播';
            }
        }
        return view('managment.push', compact('pushs', 'product'));
    }

    public function create()
    {
        $prod = Product::all()->where('store_id', Auth::guard('store')->user()->id);
        return view('managment.pushcreate', $prod);
    }

    public function view($id)
    {
        $push = Push::all()->where('id', $id);
        $product_name = Product::all()->where('id', $push->first()['Commodity_id'])->pluck('name');
        $push->first()['P_name'] = $product_name->first();
        $product_picture = Product::all()->where('id', $push->first()['Commodity_id'])->pluck('picture');
        $push->first()['P_picture'] = $product_picture->first();
        $data = ['pushs' => $push];
        return view('managment.pushview', $data);
    }

    public function store(Request $request)
    {
        $messsages = array(
            'title.required' => '你必須輸入促銷訊息名稱',

        );
        $rules = array(
            'title' => 'required',
        );

        $validator = Validator::make($request->all(), $rules, $messsages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $store = Store::all()->where('email', Auth::guard('store')->user()->email)->pluck('id');

        // save new image $file_name to database
//            $push->update(['picture' => $file_name]);

        Push::create([
            'Store_id' => $store['0'],
            'title' => $request['title'],
            'Commodity_id' => $request['Commodity_id'],
            'discount' => $request['discount'],
            'date_start' => $request['date_start'],
            'date_end' => $request['date_end'],
            'time_start' => $request['time_start'],
            'time_end' => $request['time_end'],
        ]);
        return redirect()->route('pushlist');
    }

    public function edit($id)
    {
        $pushs = Push::all()->where('id', $id);
        $promote_product = Product::all()->where('id',$pushs->first()['Commodity_id']);
        $product = Product::all()->where('store_id',Auth::guard()->user()->id)->whereNotIn('id',$pushs->first()['Commodity_id']);
        $pushs->first()['Commodity_name'] = $promote_product->first()['name'];
        return view('managment.pushedit',compact('pushs','product'));
    }

    public function update(Request $request, $id)
    {
        $push = Push::find($id);
        $push->update($request->all());
        if ($request->hasFile('picture')) {
            $file_name = $request->file('picture')->getClientOriginalName();
            $destinationPath = '/public/push';
            $request->file('picture')->storeAs($destinationPath, $file_name);

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

    public function changestatue($id)
    {
        $push = Push::all()->where('id', $id)->first();
        if ($push['statue'] == 0) {
            $push->update([
                'statue' => 1
            ]);
        }

        $user_id = User::all()->pluck('id');

        foreach ($user_id as $user_id) {
            User_push::create([
                'User_id' => $user_id,
                'Store_id' => Auth::guard('store')->user()->id,
                'Push_id' => $id,
                'use_status' => '0'
            ]);
        }

        $this->push($push);
        return redirect()->route('pushlist');
    }

    /**
     * @return mixed
     */
    public function push($push)
    {

        $notificationBuilder = new PayloadNotificationBuilder($push->title);
        $notificationBuilder->setBody($push->content)
            ->setSound('default');
        $notification = $notificationBuilder->build();
        $topic = new Topics();
        $topic->topic('news');
        $topicResponse = FCM::sendToTopic($topic, null, $notification, null);
        $topicResponse->isSuccess();
        $topicResponse->shouldRetry();
        $topicResponse->error();

        return null;
    }

    public function stop($id){
        $push = Push::all()->where('id', $id)->first();
        if ($push['statue'] == 1) {
            $push->update([
                'statue' => 0
            ]);
        }


        $whereArray = array('Push_id' => $id);
        DB::table('user_pushs')->where($whereArray)->delete();

        return redirect()->route('pushlist');
    }
}
