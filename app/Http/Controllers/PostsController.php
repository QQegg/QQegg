<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller //公告管理
{
    public function index()
    {
        $post=Post::all();
        $data=['posts'=>$post];
        return view('admin.postlist',$data);
    }
    public function store(Request $request)
    {
        Post::create($request->all());
        $post=Post::all();
        $data=['posts'=>$post];
        return view('admin.postlist',$data);
    }
    public function edit($id)
    {
        $post = Post::all()->where('id','=',$id);
        $data=['post'=>$post];
        return view('admin.postedit',$data);
    }
    public function update(Request $request,$id)
    {
        $post=Post::find($id);
        $post->update($request->all());
        return redirect()->route('postlist');
    }
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('postlist');
    }

}
