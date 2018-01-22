@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    <div class='container'>
        <form action="{{route('prostore')}}" method="POST" role="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label>產品名稱</label>
                <input name="Comm_name" class="form-control" placeholder="請輸入產品名稱">
            </div>
            <div class="form-group">
                <label>選擇產品類別</label>
                <select name="Cate_id" class="form-control">
                    　<option value="1">服飾</option>
                    　<option value="2">食品</option>
                    　<option value="3">鞋子</option>
                    　<option value="4">電子產品</option>
                </select>
            </div>
            <div class="form-group">
                <label>產品規格</label>
                <textarea name="Comm_spec" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>單價</label>
                <textarea name="Comm_price" class="form-control" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label>單位</label>
                <textarea name="Comm_unit" class="form-control" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label>庫存量</label>
                <textarea name="Comm_inv" class="form-control" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label>上傳產品照片</label>
                    <input type="file" class="form-control" id="picture" name="Comm_img" placeholder="上傳圖片" value="">
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>
        </form>
    </div>
@endsection