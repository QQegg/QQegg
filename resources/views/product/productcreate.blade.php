@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    <div class='container'>
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
                <label>選擇產品類別</label>
                <select name="Category_id" class="form-control">
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
                <textarea name="specification" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>單價</label>
                <textarea name="price" class="form-control" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label>單位</label>
                <textarea name="unit" class="form-control" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label>庫存量</label>
                <textarea name="inventory" class="form-control" rows="1"></textarea>
            </div>
            <div class="form-group">
                <label>上傳產品照片</label>
                    <input type="file" class="form-control" name="picture" placeholder="上傳圖片">
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>
        </form>
    </div>
@endsection