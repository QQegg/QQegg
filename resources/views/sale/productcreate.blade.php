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
            function addRow() {
                var div = document.createElement('div');
                div.className = 'row';
                div.innerHTML =
                   '<font>商品ID:</font>\
                    <input  class="form-control"  name="proid" value="" />\
                    <font>商品數量<font>\
                    <input class="form-control"  name="number" value="" />\
                    <input type="button" value="-" onclick="removeRow(this)">';
                document.getElementById('content').appendChild(div);
            }
            function removeRow(input) {
                document.getElementById('content').removeChild(input.parentNode);
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
            <div class="form-group"  style="display:none">
                <input name="id" class="form-control" value=@auth('id')>
            </div>
            <div class="form-group">
                消費者:
                <input name="cosid" class="form-control" placeholder="請輸入消費者ID">
            </div>
            商品:
            <div class="form-group">
                <input  class="form-control"  name="proid" value="" />
                <input class="form-control"  name="number" value="" />
            </div>
            <input type="button" value="+"  onclick="addRow()">
        </form>
    </div>
@endsection