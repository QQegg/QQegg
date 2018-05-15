@extends('layouts.master')
@section('title','書籍觀看')
@section('content')
    <div class='container-fluid'>
        <script>
            function ConfirmCreate()
            {
                var x = confirm("你確定要修改此類別嗎?");
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
        @foreach($category as $category)
        <form action="{{route('cateupdate', ['id'=>$category->id])}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>類別名稱</label>
                <input name="C_name" class="form-control" placeholder="請輸入產品類別"value="{{$category->name}}">
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-success">修改</button>
                <a href="{{route('catelist')}}" class="btn btn-success">返回</a>
            </div>
        </form>
            @endforeach
    </div>
@endsection