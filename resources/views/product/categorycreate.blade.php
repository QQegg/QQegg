@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    <div class='container-fluid'>
        <script>
            function ConfirmCreate()
            {
                var x = confirm("你確定要新增此類別嗎?");
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
        <form action="{{route('catestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
            {{ csrf_field() }}
            <div class="form-group">
                <label>類別名稱</label>
                <input name="name" class="form-control" placeholder="請輸入產品類別">
            </div>
            <div class="text-left">
                <button type="submit" class="btn btn-success">新增</button>
            </div>
        </form>
    </div>
@endsection