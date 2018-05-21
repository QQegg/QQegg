@extends('layouts.master')
@section('title','書籍觀看')
@section('content')

    <div class="container">
        <h2  class="text-center & text-success" ><strong>商品詳細資訊</strong></h2>
        <hr class="colorgraph">
            @foreach($product as $product)
            <div class="col-lg-3">
                <h2 class="my-4">{{$product->name}}</h2>
                <img src="{{url('../storage/product/'. $product->picture)}}"  style="border:2px green dashed;">
                <div class="list-group">
                    <h3 class="my-4">商品類別：
                        @if(count($product->C_name) == 0)
                            此產品尚未被分類
                        @else
                            {{$product->C_name}}
                        @endif
                    </h3>
                    <h3 class="my-4">商品規格：{{$product->specification}}</h3>
                    <h3 class="my-4">商品單價：{{$product->price}}</h3>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('proedit',$product->id)}}" class="btn btn-success">修改</a>
                    <a href="{{route('prolist')}}" class="btn btn-success">返回</a>
                </div>
            </div>
            @endforeach
    </div>

@endsection