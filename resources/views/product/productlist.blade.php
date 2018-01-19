@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    @foreach($product as $product)
<div class="panel panel-default">
    <div class="panel-body">
        <div class="container-fluid" style="padding:0;">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="margin-top:0;"></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <font size=5>商品名稱:{{$product->Comm_name}}</font>
                </div>
            </div>
            <hr style="margin:10px 0;" />
            <div class="row">
                <div class="col-md-12">
                    商品庫存:
                    {{$product->Comm_inv}}{{$product->Comm_unit}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    商品規格:
                    {{$product->Comm_spec}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    商品單價:
                    {{$product->Comm_price}}
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-md-12">
                    <a href="{{route('proupdate')}}" class="btn btn-xs btn-danger">產品修改</a>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-md-12">
                    <a href="#" class="btn btn-xs btn-danger">產品下架</a>
                </div>
            </div>
        </div>
    </div>
</div>
    @endforeach
@endsection