<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dealmatch;
use App\Transaction;
class TransactionsController extends Controller
{
    var $data;
    public  function index(){
       return view('sale.productlist');
    }
    public function prestore(){
        global $data;
        if(count(Transaction::all()->pluck('id'))!=0) {
            $data['id'] = last(last(Transaction::all()->pluck('id')))+1;
        }
        else{
            $data['id']=1;
        }
       $salelist = Dealmatch::all()->where('Tran_id' , $data);
        return view("sale.productcreate")->with(array('salelist'=>$salelist))->with(array('dealid'=>$data));

    }
    public function store(Request $request){
        global $data;
        dd($request);
        Dealmatch::creat([
            'Tran_id'=>'what'
            ]);
        $salelist = Dealmatch::all([



        ]);
        return view("sale.productcreate")->with(array('salelist'=>$salelist))->with(array('dealid'=>$data));

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
