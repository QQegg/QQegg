<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $com=Comment::all();
        return view('comment.comment',compact('com'));
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
