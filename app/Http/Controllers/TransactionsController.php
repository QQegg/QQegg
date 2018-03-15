<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
class TransactionsController extends Controller
{
    public  function index(){
       return view('sale.productlist');
    }
    public function prestore(){
        $data=null;
        if(count(Transaction::all()->pluck('id'))!=0) {
            $data = last(last(Transaction::all()->pluck('id')))+1;
        }
        else{
            $data=1;
        }
        return view(sale.productlist,$data);
    }

    public function store(Request $request){

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
