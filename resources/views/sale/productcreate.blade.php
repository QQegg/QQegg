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
            <?php
            document.getElementById('S_id').value = "www" ;
            document.getElementById('Tran_id').valu = $dealid;
            ?>
            < form action="{{route('salestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
                {{ csrf_field() }}
                <div hidden>
                    <input name="S_id" class="form-control">
                </div>
                <div hidden>
                    <input name="Tran_id" class="form-control" >
                </div>
                <div class="form-group">
                消費者:
                <input name="cosid" class="form-control" placeholder="請輸入消費者ID">
            </div>
                商品輸入:
            <div class="form-group">
                <input  class="form-control"  name="proid1" value="" />
                數量:
                <input class="form-control"  name="number1" value="" />
            </div>
            <button type="submit" class="btn btn-success">新增</button>
        </form>
    </div>
@endsection