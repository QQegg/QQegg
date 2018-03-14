@extends('product.layout.master')
@section('title','結帳')
@section('content')
    <div class='container-fluid'>
        <script>
            function ConfirmCreate()
            {
                var x = confirm("確認結帳內容?");
                if (x)
                    return true;
                else
                    return false;
            }
            var count = 2;
            function addRow() {
                var div = document.getElementById('responce');
                div.innerHTML +=
                    '商品'+count+'\
                :<input type="text" class="form-control" name="proid"+count value="" />\
                        '+'數量'+
                '<input type="text" class="form-control" name="value"+count value="" />\
                <br>\
                ';
                count++
            }
        </script>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('salestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
            {{ csrf_field() }}
            <div class="form-group">
                消費者:
                <input name="cosid" class="form-control" placeholder="請輸入消費者ID">
            </div>
            商品1:
            <div class="form-group">
                <input  class="form-control"  name="proid" value="" />
                數量:
                <input class="form-control"  name="number" value="" />
            </div>
            <span id="responce"></span>
            <input type="button" value="+"  onclick="addRow()" >
            <button type="submit" class="btn btn-success">新增</button>

        </form>
    </div>
@endsection