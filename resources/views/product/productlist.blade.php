@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    <div class='container'>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container-fluid" style="padding:0;">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 style="margin-top:0;"></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-right">
                                進貨日期:

                            </div>
                        </div>
                        <hr style="margin:10px 0;" />
                        <div class="row">
                            <div class="col-md-12">
                                商品庫存:

                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-xs btn-danger">產品修改</a>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-xs btn-danger">產品下架</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <form action="{{route('prostore')}}" method="POST" role="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label>產品名稱</label>
                <input name="Comm_name" class="form-control" placeholder="請輸入書籍標題">
            </div>
            <div class="form-group">
                <label>類別編號</label>
                <select name="Cate_id">
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
            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>
        </form>
    </div>
@endsection