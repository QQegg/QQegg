<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller //公告管理
{
    public function index()
    {
        $posts=Post::all();
        return view('admin.postlist',compact('posts'));
    }
    public function store(Request $request)
    {
        $management_id = Admin::all()->where('account', Auth::guard('admin')->user()->account)->pluck('id');
        Post::create([
            'Admin_id' => $management_id->first(),
            'title' => $request['title'],
            'content' => $request['content'],
        ]);
        $posts = Post::all();
        return view('admin.postlist',compact('posts'));
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

    public function showindex()
    {
        $posts = Post::all();
        return view('index.index',compact('posts'));
    }

    public function showpost($id)
    {
        $posts = Post::all()->where('id',$id);
        return view('postcontent',compact('posts'));
    }
    
}
