@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    <div class='container-fluid'>
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
                <input name="name" class="form-control" placeholder="請輸入產品名稱"value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label>產品類別</label>
                <input name="C_name" class="form-control" placeholder="請輸入產品類別"value="{{$product->C_name}}">
            </div>
            <div class="form-group">
                <label>產品規格</label>
                <textarea name="specification" class="form-control" placeholder="請輸入產品規格" rows="5">{{$product->specification}}</textarea>
            </div>
            <div class="form-group">
                <label>單價</label>
                <textarea name="price" class="form-control" placeholder="請輸入產品單價" rows="1">{{$product->price}}</textarea>
            </div>
            <div class="form-group">
                <label>單位</label>
                <textarea name="unit" class="form-control" placeholder="請輸入產品單位" rows="1">{{$product->unit}}</textarea>
            </div>
            <div class="form-group">
                <label>上傳產品照片</label>
                <input type="file" class="form-control" name="picture" placeholder="上傳圖片"{{$product->picture}}>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-success">修改</button>
            <a href="{{route('prolist')}}" class="btn btn-success">返回</a>
            </div>
        </form>
            @endforeach

    </div>
@endsection