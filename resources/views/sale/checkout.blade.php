@extends('layouts.master')
@section('title','結算')
@section('content')
    <div class="col-md-12">
        <h1> 結帳總金額:{{$saleinfo}}</h1>
    </div>
<form action="{{route('checkout')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
    {{ csrf_field() }}
    <div hidden>
        <input class="form-control"  name="price" value="{{$saleinfo}}" />
    </div>
    <div hidden>
        <input class="form-control"  name="Member" value="{{$Member_id}}" />
    </div>
    <div class="form-group">
    <select name="discount" class="form-control">
        <option value="1" selected="selected">請選擇要用的折價券</option>
        @foreach($copon as $copon)
            <option value="{{$copon->discount}}">{{$copon->title}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        請輸入要使用的積點數量:(此會員可用積點:{{$point}})
        <input class="form-control"  name="point" value=0 />
    </div>
    <button type="submit" class="btn btn-success">結算</button>
</form>


@endsection