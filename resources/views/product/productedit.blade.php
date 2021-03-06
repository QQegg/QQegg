@extends('layouts.master')
@section('title','書籍觀看')
@section('content')
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

        <div class="container">
            <h2  class="text-center & text-success" ><strong>修改商品</strong></h2>
            <hr class="colorgraph">
            @foreach($product as $product)
                <form action="{{route('proupdate', ['id'=>$product->id])}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmEdit()">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label>商品名稱</label>
                        <input name="name" class="form-control" placeholder="請輸入商品名稱" value="{{$product->name}}" required>
                    </div>
                    <div class="form-group">
                        <label>產品類別</label>
                        <select name="C_name" class="form-control" required>
                            @if($product->Category_id == 0)
                                <option value="{{$product->Category_id}}" selected="selected">未分類</option>
                            @else
                                <option value="{{$product->Category_id}}" selected="selected">{{$product->C_name}}</option>
                            @endif
                            @foreach($category as $category)
                                <option value="{{$category->id}}" @if(old('C_name') == $category->id) selected="selected" @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>商品規格</label>
                        <textarea name="specification" class="form-control" placeholder="請輸入商品規格" rows="5" required>{{$product->specification}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>單價</label>
                        <textarea name="price" class="form-control" placeholder="請輸入商品單價" rows="1" required>{{$product->price}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>上傳產品照片</label>
                        <input type="file" class="form-control" name="picture" placeholder="上傳圖片" required>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submit" class="btn btn-success">修改</button>
                        <a href="{{route('prodetail',$product->id)}}" class="btn btn-success">返回</a>
                    </div>
                </form>
            @endforeach
        </div>
@endsection