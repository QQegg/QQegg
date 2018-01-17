@extends('admin.layout.master')
@section('title','推播編輯')
@section('content')
    <div class='container'>
            <form action="/admin/addproductlist" method="POST" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>標題</label>
                    <input name="P_title" class="form-control" placeholder="請輸入書籍標題">
                </div>
                <div class="form-group">
                    <label>內容</label>
                    <textarea name="P_content" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label>商品類別編號</label>
                    <textarea name="Cate_id" class="form-control" rows="1"></textarea>
                </div>
                <div class="form-group">
                    <label>附帶優惠券</label>
                    <textarea name="C_id" class="form-control" rows="1"></textarea>
                </div>
                <div class="hide">
                    <label>價格</label>
                    <textarea name="S_id" class="form-control" rows="1"></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">新增</button>
                </div>
            </form>
    </div>
@endsection