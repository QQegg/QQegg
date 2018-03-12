@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    <div class='container-fluid'>
        <script>
            function ConfirmCreate()
            {
                var x = confirm("你確定要新增此產品嗎?");
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
        <form action="{{route('prostore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
            {{ csrf_field() }}
            <div class="form-group">
                <label>產品名稱</label>
                <input name="name" class="form-control" placeholder="請輸入產品名稱">
            </div>
            <div class="form-group">
                <label>產品類別</label>
                <input name="C_name" class="form-control" placeholder="請輸入產品類別">
            </div>
            <div class="form-group">
                <label>產品規格</label>
                <textarea name="specification" class="form-control" rows="5" placeholder="請輸入產品規格"></textarea>
            </div>
            <div class="form-group">
                <label>單價</label>
                <textarea name="price" class="form-control" rows="1" placeholder="請輸入產品單價"></textarea>
            </div>
            <div class="form-group">
                <label>單位</label>
                <textarea name="unit" class="form-control" rows="1" placeholder="請輸入產品單位"></textarea>
            </div>
            <div class="form-group">
                <label>上傳產品照片</label>
                    <input type="file" class="form-control" name="picture" placeholder="上傳圖片">
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-success">新增</button>
            </div>
        </form>
    </div>
@endsection