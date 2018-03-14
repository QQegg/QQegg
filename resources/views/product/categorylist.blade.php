@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    @if(count($category) == 0)
        <p class="text-center">
            沒有任何商品
        </p>
    @endif

    商品類別:
    @foreach($category as $category)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container-fluid" style="padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            {{$category->name}}
                        </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <form class="delete" action="{{ route('catedestroy', $category->id) }}"method="POST" onsubmit="return ConfirmDelete()">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="submit" class="btn btn-xs btn-danger" value="刪除">
                        </form>
                        <a href="{{route('cateedit',$category->id)}}" class="btn btn-xs btn-danger">修改</a>
                    </div>
                    <script>
                        function ConfirmDelete()
                        {
                            var x = confirm("你確定要刪除此產品嗎?");
                            if (x)
                                return true;
                            else
                                return false;
                        }
                    </script>
                </div>
            </div>
        </div>
    @endforeach
@endsection