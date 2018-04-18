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
            <div class="container">
                <h2  class="text-center & text-primary" style="font-family:標楷體" ><strong>購買商品</strong></h2>
                <hr class="colorgraph">
                <table class="table">
                    <thead>
                    <tr>
                        <th>名稱</th>
                        <th>單價</th>
                        <th>數量</th>
                        <th>金額</th>
                    </tr>
                    </thead>
                    <tbody>
            @if($salelist!=null)
                @foreach($salelist as $list)
                    {{--<div class="column">--}}
                    {{--<div class="col-md-12">--}}
                        {{--商品名稱:{{$list->name}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="column">--}}
                    {{--<div class="col-md-12">--}}
                        {{--商品單價:--}}
                        {{--{{$list->price}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="column">--}}
                    {{--<div class="col-md-12">--}}
                        {{--商品數量:--}}
                        {{--{{$list->number}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                    <tr>
                        <td>{{$list->name}}</td>
                        <td>{{$list->price}}</td>
                        <td>{{$list->number}}</td>
                        <td>{{$list->total}}</td>
                    </tr>
                @endforeach
            @else
                <div class="col-md-12">
                    目前無商品列表
                </div>
            @endif
                    </tbody>
                </table>
            </div>
            <div class="progress-bar & bg-warning " style="width:100%;height:1px"></div>
                <h2 class=" text-right & text-danger "  style="font-family:標楷體 ;position: absolute; right:200pt "><strong>合計:{{$saleinfo}}元</strong> </h2>
            <form action="{{route('prestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
                {{ csrf_field() }}
                <br>
                <br>
                <div class="container ">
                    <h3 class="bg-info"   style="font-family:標楷體  "><strong>商品輸入</strong></h3>
                    ID :
                    <input  class="form-horizontal "  name="proid" autofocus />
                    數量 :
                <input class="form-horizontal"  name="number" value="1"/>

                <div hidden>
                    <input  class="form-control"  name="Member_id" value={{$Member_id}} />
                </div>
                <button type="submit" class="btn btn-primary & form-horizontal">新增</button>
    </div>
            </form>
            <form action="{{route('salestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
                {{ csrf_field() }}
                <div hidden>
                    <input class="form-control"  name="price" value="{{$saleinfo}}" />
                </div>
                <div hidden>
                    <input class="form-control"  name="Member" value="{{$Member_id}}" />
                </div>
                <br>
                <div class="container ">
                    <h3   class="bg-info" style="font-family:標楷體  "><strong>使用折價券折扣或積點折抵</strong></h3>
                    折價券 :
                    <select name="discount" class="form-horizontal ">
                        <option value="1" selected="selected">請選擇要用的折價券</option>
                        @foreach($copon as $copon)
                            <option value="{{$copon->discount}}">{{$copon->title}}</option>
                        @endforeach
                    </select>
                    積點 :
                    <input class="form-horizontal "  name="point"  placeholder="此會員可用積點:{{$point}}"/>
                    <button type="submit" class="btn btn-primary  & form-horizontal">結帳</button>
                </div>
                <br>
                <div class="container ">
                    <br>
                    <div class="col-md-12">
                        <h1> 結帳總金額:{{$price}}</h1>
                    </div>
                    <a href="{{route('salecreat')}}"><button type="submit" class="btn btn-success">下一筆</button></a>

                </div>
            </form>


    </div>
@endsection