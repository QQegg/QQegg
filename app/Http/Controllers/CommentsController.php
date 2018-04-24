<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $com=Comment::all();
        $cc = 0;
        foreach ($com as $count){
            $member = User::all()->where('id',$count['Member_id']);
            $member_name[$cc] = $member->first();
            $cc++;
        }
        return view('comment.comment',compact('com','member_name'));
    }
    public function store(Request $request)
    {
        Post::create($request->all());
        $com=Comment::all();
        $data=['com'=>$com];
        return view('admin.comlist',$data);
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
        Comment::destroy($id);
        return redirect()->route('comlist');
    }
}
