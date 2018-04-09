@extends('product.layout.master')
@section('title','結算')
@section('content')
    <div class="col-md-12">
        <h1> 結帳總金額:{{$price}}</h1>
    </div>
    <a href="{{route('salecreat')}}"><button type="submit" class="btn btn-success">結帳</button></a>
@endsection