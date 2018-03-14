<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transactions;

class TransactionsController extends Controller
{
    public  function index(){
        return view('sale.productcreate');
    }
    public function store(Request $request){
        $id=null;
        for ($count = 0;$count<= count($request);$count=$count+2) {
            $data = null;
            for ($count2=$count;$count2<=1;$count2++){
                if ($data=null){
                    $data[0]=$request[$count];
                }
                else{
                    $data[1]=$request[$count];
                }
            }
            if (!$count>=2){
                $id=DB::table('transactions')->insertgetid(
                    ['Store_id'=>$data[0], 'Member_id'=>$data[1]]
                );
            }
            else{
                DB::table('transactions')->insert(
                    ['Tran_id'=>$id ,'Commodity_id'=>$data[0],'number'=>$data[1]]);
            }
        }
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
