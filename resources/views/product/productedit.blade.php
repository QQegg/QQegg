@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    <div class='container'>
        <script>
            function ConfirmEdit()
            {
                var x = confirm("你確定要修改此產品嗎?");
                if (x)
                    return true;
                else
                    return false;
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
        @foreach($product as $product)
        <form action="{{route('proupdate', ['id'=>$product->id])}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmEdit()">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>產品名稱</label>
                <input name="name" class="form-control" placeholder=""value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label>選擇產品類別</label>
                <select name="Category_id">
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
                <textarea name="specification" class="form-control" rows="5">{{$product->specification}}</textarea>
            </div>
            <div class="form-group">
                <label>單價</label>
                <textarea name="price" class="form-control" rows="1">{{$product->price}}</textarea>
            </div>
            <div class="form-group">
                <label>單位</label>
                <textarea name="unit" class="form-control" rows="1">{{$product->unit}}</textarea>
            </div>
            <div class="form-group">
                <label>庫存量</label>
                <textarea name="inventory" class="form-control" rows="1">{{$product->inventory}}</textarea>
            </div>
            <div class="form-group">
                <label>上傳產品照片</label>
                <input type="file" class="form-control" name="picture" placeholder="上傳圖片">
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-success">修改</button>
            </div>
        </form>
            @endforeach
        <div  class="text-right">
            <a href="{{route('prolist')}}" class="btn btn-success">返回</a>
        </div>
    </div>
@endsection