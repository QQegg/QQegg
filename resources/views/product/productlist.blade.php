@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    @if(count($product) == 0)
        <p class="text-center">
            沒有任何商品
        </p>
    @endif
    @foreach($product as $product)
<div class="panel panel-default">
    <div class="panel-body">
        <div class="container-fluid" style="padding:0;">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="margin-top:0;"></h1>
                </div>
            </div>
            <img src="{{url('../storage/product/'. $product->picture)}}" width="300px" height="200px" style="border:2px green dashed;">
            <div class="row">
                <div class="col-md-12">
                    <font size=5>商品名稱:{{$product->name}}</font>
                </div>
            </div>
            <hr style="margin:10px 0;" />
            <div class="btn-group" role="group" aria-label="Basic example">
                <form class="delete" action="{{ route('prodestroy', $product->id) }}"method="POST" onsubmit="return ConfirmDelete()">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="submit" class="btn btn-xs btn-danger" value="產品下架">
                    <a href="{{route('prodetail',$product->id)}}" class="btn btn-xs btn-danger">觀看產品詳細資訊</a>
                </form>
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