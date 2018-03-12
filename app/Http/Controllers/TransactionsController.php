<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
class TransactionsController extends Controller
{
    public function index()
    {
        $com=Comment::all();
        $data=['com'=>$com];
        return view('comment.comment',$data);
    }
    public function create(){
        return view();
    }
    public function store(Request $request)
    {
        Post::create($request->all());
        $com=Comment::all();
        $data=['com'=>$com];
        return view('admin.comlist',$data);
    }
}
//$parent = Parent::create(['name' => 'Bob']);
//foreach($names as $name)
//{
//$kid = new Kid(['name' => $name]);
//$kid->parent()->associate($parent);
//  $parent->kids->add($kid);
//}
//$parent->push();
