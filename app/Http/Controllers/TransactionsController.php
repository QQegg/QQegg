<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Push;
use App\User;
use App\User_coupon;
use Illuminate\Support\Facades\Auth;
use App\Store;
use Illuminate\Http\Request;
use App\Dealmatch;
use App\Transaction;
use App\Product;
class TransactionsController extends Controller
{

    public  function index(){
       return view('sale.productlist');
    }
    public function readycheck(){
        return view('sale.productcostomer');
    }
    public function cotomer(Request $request){
        $salelist=null;
        $s_id=Store::all()->where("email",Auth::guard('store')->user()->email)->pluck('id');
        Transaction::create([
            'Store_id'=>$s_id[0],
            'Member_id'=>$request['Member_id'],
            'Coupon_id'=>'0',
             'number'=>'1'
        ]);
        $saleinfo=0;
        $salelist=Dealmatch::all()->where('Tran_id',Transaction::all()->pluck('id')->last());
        $Scopon=Coupon::all()->where('Store_id',$s_id)->pluck('id');
        dd($Scopon);
        $copon=User_coupon::all()->where('User_id',$request['Member_id'])->where('Coupon_id','=',$Scopon);

        $point=User::all()->where('id',$request['Member_id'])->pluck('point');
        $re=0;
        //dd($copon);
        $coupon_list=null;
        $cc = 0;
        if(count($copon)!=0){
            foreach ($copon as $qq){
                $coupon=Coupon::all()->where('id',$qq['Coupon_id']);
                $coupon_list[$cc] = $coupon;
                $cc++;
            }
        }
        $push=Push::all()->where("Store_id",Auth::guard('store')->user()->id)->where('statue',1);
        return view('sale.productcreate')->with('re',$re)->with('saleinfo',$saleinfo)->with('copon',$copon)
            ->with('point',$point)->with('Member_id',$request['Member_id'])->with('salelist',$salelist)->with('price',$saleinfo)->with('coupon_list',$coupon_list)->with('push',$push);
    }
    public function prestore(Request $request){
        Dealmatch::create(
            [
                'Tran_id'=> Transaction::all()->pluck('id')->last(),
                'number'=>$request['number'],
                'Commodity_id'=>$request['proid']
            ]
        );
        $saleinfo=0;
        $salelist=Dealmatch::all()->where('Tran_id',Transaction::all()->pluck('id')->last());
        foreach ($salelist as $info)
        {
            $saleinfo=$saleinfo+(($info['number'])*(Product::all()->where('id',$info['Commodity_id'])->pluck('price')->last()));
        }
        foreach ($salelist as $item)
        {
            $item['name']=Product::all()->where('id',$item['Commodity_id'])->pluck('name')->last();
            $item['price']=Product::all()->where('id',$item['Commodity_id'])->pluck('price')->last();
            $item['total']=$item['price']*$item['number'];
        }
        $copon=User_coupon::all()->where('User_id',$request['Member_id']);
        $point=User::all()->where('id',$request['Member_id'])->pluck('point');
        $pirce=$request['price']-$request['discount']-$request['point'];
        $member=User::find($request['Member']);
        $re=$member['point'];
        $cc = 0;
        foreach ($copon as $qq){
            $coupon=Coupon::all()->where('id',$qq['Coupon_id']);
            $coupon_list[$cc] = $coupon;
            $cc++;
        }
        $push=Push::all()->where("Store_id",Auth::guard('store')->user()->id);
        return view('sale.productcreate')->with('saleinfo',$saleinfo)->with('copon',$copon)->with('point',$point)->with('re',$re)->with('Member_id',$request['Member_id'])
            ->with('salelist',$salelist)->with('price',$saleinfo)->with('coupon_list',$coupon_list)->with('push',$push);
    }
    public function checkout(Request $request){
        $pirce=$request['price']-$request['discount']-$request['point'];
        $member=User::find($request['Member']);
        $re=$member['point']-$request['point']+($pirce*0.01);
        if($member!=null){
            $member->point=$re;
            $member->save();
        }
        return view('sale.endprice')->with('price',$pirce);
    }
    public function store(Request $request){
        $saleinfo=0;
        $salelist=Dealmatch::all()->where('Tran_id',Transaction::all()->pluck('id')->last());
        foreach ($salelist as $info)
        {
            $saleinfo=$saleinfo+(($info['number'])*(Product::all()->where('id',$info['Commodity_id'])->pluck('price')->last()));
        }
        foreach ($salelist as $item)
        {
            $item['name']=Product::all()->where('id',$item['Commodity_id'])->pluck('name')->last();
            $item['price']=Product::all()->where('id',$item['Commodity_id'])->pluck('price')->last();
            $item['total']=$item['price']*$item['number'];
        }
        $copon=User_coupon::all()->where('User_id',$request['Member_id']);
        $point=User::all()->where('id',$request['Member_id'])->pluck('point');
        $pirce=$request['price']-$request['discount']-$request['point'];
        $member=User::find($request['Member']);
        $re=$member['point']-$request['point']+($pirce*0.01);
        if($member!=null){
            $member->point=$re;
            $member->save();
        }
        $cc = 0;
        if($request['discount']!=0 or $request['discount']!=null)
        {
            $discri=Coupon::all()->where('discount',$request['discount'])->pluck('id')->last();
            $CSS=User_coupon::all()->where('User_id',$request['Member'])->where('Coupon_id',$discri)->pluck('id')->first();
            $CS=User_coupon::find($CSS);
            $CS->use_status=1;
            $CS->save();
        }
        foreach ($copon as $qq){
            $coupon=Coupon::all()->where('id',$qq['Coupon_id']);
            $coupon_list[$cc] = $coupon;
            $cc++;
        }

        return view('sale.productcostomer');
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
