@extends('layouts.master')
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
                <input name="name" class="form-control" value="{{old('name')}}" placeholder="請輸入產品名稱">
            </div>
            <div class="form-group">
            <label>產品類別</label>
            <select name="C_name" class="form-control">
                <option value="" disabled="disabled" selected="selected">請選擇產品類別</option>
                @foreach($category as $category)
                <option value="{{$category->id}}" @if(old('C_name') == $category->id) selected="selected" @endif>{{$category->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                <label>產品規格</label>
                <input name="specification" class="form-control" row="5" value="{{old('specification')}}" placeholder="請輸入產品規格">
            </div>
            <div class="form-group">
                <label>單價</label>
                <input name="price" class="form-control" value="{{old('price')}}" placeholder="請輸入產品單價">
            </div>
            <div class="form-group">
                <label>單位</label>
                <input name="unit" class="form-control" value="{{old('unit')}}" placeholder="請輸入產品單位">
            </div>
            <div class="form-group">
                <label>上傳產品照片</label>
                    <input type="file" class="form-control" name="picture" value="{{old('picture')}}" placeholder="上傳圖片">
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-success">新增</button>
            </div>
        </form>
    </div>
@endsection