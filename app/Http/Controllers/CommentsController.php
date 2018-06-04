<?php

namespace App\Http\Controllers;

use App\Comment;
use App\StoreComment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function index()
    {
        $com2=Comment::all()->where('Store_id',Auth::guard('store')->user()->id);

        $low=0;

        $com = array();

        foreach ($com2 as $count){
            $com[$low] = $count;
            $low++;
        }

        $cc = 0;
        foreach ($com as $count){
            $member = User::all()->where('id',$count['Member_id'])->pluck('name');
            $com[$cc]['member_name'] = $member->first();
            $cc++;
        }//抓取留言消費者資料

        $Store_id = StoreComment::all()->where('Store_id',Auth::guard('store')->user()->id)->pluck('Member_id');
        $aa = 0;
        $iscomment = array();
        foreach ($com as $count){
            $iscomment2 = User::all()->whereNotIn('id',$Store_id)->where('id',$count->Member_id);
            $iscomment[$aa] = $iscomment2->first();
            $aa++;
        }//抓取以留言並且尚未被店家回覆的消費者資料
        $iscomment = array_filter($iscomment);

        $aa = 0;
        foreach ($com as $count){
            $store_content = StoreComment::all()->where('Member_id',$count['Member_id'])->where('Store_id',Auth::guard('store')->user()->id)->pluck('content');
            $com[$aa]['Store_comment'] = $store_content->first();
            $aa++;
        }//抓取店家的留言
        return view('comment.comment',compact('com','iscomment'));
    }
    public function store(Request $request)
    {
        $store_id = Auth::guard('store')->user()->id;
        StoreComment::create([
            'Member_id' => $request['Member_id'],
            'Store_id' => $store_id,
            'content' => $request['content'],
        ]);
        return redirect()->route('comlist');
    }
    public function edit($id)
    {
        $com = Comment::all()->where('id','=',$id);
        $data=['com'=>$com];
        return view('comment.comment',$data);
    }
    public function update(Request $request,$id)
    {
        $com=Comment::find($id);
        $com->update($request->all());
        return redirect()->route('comlist');
    }
    public function destroy($id)
    {
        $whereArray = array('Member_id' => $id);
        DB::table('comment_store')->where($whereArray)->delete();
        return redirect()->route('comlist');
    }
}
