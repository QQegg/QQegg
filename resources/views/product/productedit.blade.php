@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    <div class='container'>
        @foreach($product as $product)
        <form action="{{route('proupdate', ['id'=>$product->id])}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>產品名稱</label>
                <input name="Comm_name" class="form-control" placeholder=""value="{{$product->Comm_name}}">
            </div>
            <div class="form-group">
                <label>選擇產品類別</label>
                <select name="Cate_id">
                    <option value="1">女生服飾</option>
                    <option value="2">男生服飾</option>
                    <option value="3">美妝保健</option>
                    <option value="4">手機平板與週邊</option>
                    <option value="5">嬰幼童與母親</option>
                    <option value="6">3C相關</option>
                    <option value="7">居家生活</option>
                    <option value="8">家電影音</option>
                    <option value="9">戶外與運動用品</option>
                    <option value="10">美食、伴手禮</option>
                    <option value="11">汽機車零件百貨</option>
                    <option value="12">寵物</option>
                    <option value="13">娛樂</option>
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
            <div class="form-group">
                <label>上傳產品照片</label>
                <input type="file" class="form-control" name="Comm_img" placeholder="上傳圖片">
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success">修改</button>
            </div>
        </form>
            @endforeach
    </div>
@endsection