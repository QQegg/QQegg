<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsContorller extends Controller
{
    public function index()
    {
        $post=Post::all();
        $data=['pushs'=>$post];
        return view('admin.postlist',$data);
    }
    public function store(Request $request)
    {
        Post::create($request->all());
        $post=Post::all();
        $data=['pushs'=>$post];
        return view('admin.postlist',$data);
    }
    public function edit($id)
    {
        $post = Post::all()->where('id','=',$id);
        $data=['books'=>$post];
        return view('admin.postedit')->with('push',$data);;
    }
    public function update(Request $request,$id)
    {
        $post=Post::find($id);
        $post->update($request->all());
        return View('admin.postlist');
    }
    public function destroy($id)
    {
        Post::destroy($id);
        $post=Post::all();
        $data=['pushs'=>$post];
        return view('admin.postlist',$data);
    }
}
