@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    <div class='container'>
        @foreach($product as $product)
        <form action="{{route('proupdate', ['id'=>$product->id])}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>產品名稱</label>
                <input name="Comm_name" class="form-control" placeholder=""value="{{$product->Comm_name}}">
            </div>
            <div class="form-group">
                <label>選擇產品類別</label>
                <select name="Cate_id">
                    　<option value="1">服飾</option>
                    　<option value="2">食品</option>
                    　<option value="3">鞋子</option>
                    　<option value="4">電子產品</option>
                </select>
            </div>
            <div class="form-group">
                <label>產品規格</label>
                <textarea name="Comm_spec" class="form-control" rows="5">{{$product->Comm_spec}}</textarea>
            </div>
            <div class="form-group">
                <label>單價</label>
                <textarea name="Comm_price" class="form-control" rows="1">{{$product->Comm_price}}</textarea>
            </div>
            <div class="form-group">
                <label>單位</label>
                <textarea name="Comm_unit" class="form-control" rows="1">{{$product->Comm_unit}}</textarea>
            </div>
            <div class="form-group">
                <label>庫存量</label>
                <textarea name="Comm_inv" class="form-control" rows="1">{{$product->Comm_inv}}</textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success">修改</button>
            </div>
        </form>
            @endforeach
    </div>
@endsection