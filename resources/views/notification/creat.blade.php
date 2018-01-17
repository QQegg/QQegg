@extends('notification.layout.master')
@section('title','推播編寫')
@section('content')
    <div class='container'>
        @if(count($push) == 0)
            <p class="text-center">
            無已設定推播訊息
            </p>
        @endif
            <form action="/notification/store" method="POST" role="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>標題</label>
                    <input name="P_title" class="form-control" placeholder="輸入標題">
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
                    <label>優惠券</label>
                    <textarea name="C_id" class="form-control" rows="1"></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">新增</button>
                </div>
            </form>
    </div>
@endsection