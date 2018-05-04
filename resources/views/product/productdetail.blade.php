@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')

<div class="panel panel-default">
    <div class="panel-body">
        <div class="container-fluid" style="padding:0;">
            @foreach($product as $product)
            <div class="col-lg-3">
                <h1 class="my-4">商品資訊</h1>
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
    </div>
</div>

@endsection