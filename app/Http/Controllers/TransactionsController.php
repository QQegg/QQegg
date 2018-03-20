<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Store;
use Illuminate\Http\Request;
use App\Dealmatch;
use App\Transaction;
class TransactionsController extends Controller
{
    var $data,$salelist;
    public  function index(){
       return view('sale.productlist');
    }

    public function readycheck(){
        return view('sale.productcostomer');
    }

    public function cotomer(Request $request){
        global $data,$salelist;
        $s_id=Store::all()->where("email",Auth::guard('store')->user()->email)->pluck('id');
        Transaction::create([
            'Store_id'=>$s_id[0],
            'Member_id'=>$request['Member_id'],
            'Coupon_id'=>'0'
        ]);
        $data=last(Transaction::all());
        return view('sale.productcreate')->with('salelist',$salelist);
    }

    public function prestore(){
        global $data;
        $salelist=Dealmatch::all()->where('id',$data);
        return view('sale.productcreate')->with('salelist',$salelist);
    }


    public function store(Request $request){
        global $data;
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
