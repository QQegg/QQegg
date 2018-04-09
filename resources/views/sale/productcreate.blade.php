@extends('product.layout.master')
@section('title','結帳')
@section('content')
    <div class='container-fluid'>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @if($salelist!=null)
                @foreach($salelist as $list)
                    <div class="row">
                    <div class="col-md-12">
                        商品名稱:{{$list->name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        商品單價:
                        {{$list->price}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        商品數量:
                        {{$list->number}}
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-md-12">
                    目前無商品列表
                </div>
            @endif
            <form action="{{route('prestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
                {{ csrf_field() }}
                商品輸入:
                <div class="form-group">
                    ID:
                    <input  class="form-control"  name="proid" autofocus />
                    數量:
                <input class="form-control"  name="number" value="1"/>
                    </div>
                <div hidden>
                    <input  class="form-control"  name="Member_id" value={{$Member_id}} />
                </div>
                <button type="submit" class="btn btn-success">新增</button>
            </form>
            <form action="{{route('salestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
                {{ csrf_field() }}
                <div hidden>
                    <input  class="form-control"  name="Member_id" value={{$Member_id}} />
                </div>
                <button type="submit" class="btn btn-success">結帳</button>
            </form>


            <div class="col-md-12">
                <h1> 結帳總金額:{{$saleinfo}}</h1>
            </div>
            <form action="{{route('salestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
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


    </div>
@endsection