@extends('product.layout.master')
@section('title','書籍觀看')
@section('content')
    @if(count($product) == 0)
        <p class="text-center">
            沒有任何商品
        </p>
    @endif

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container-fluid" style="padding:0;">
                <div style="position: relative;">
                <button style="float: right" class="btn btn-info" data-toggle="modal" data-target="#createproduct">+新增商品</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createproduct" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">新增產品</h4>
                    <button class="close" data-dismiss="modal">×</button>
                </div>
                <form action="{{route('prostore')}}" id="form" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
                    {{ csrf_field() }}
                        <div class="modal-body">
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <div class="field">
                                    <label>產品名稱</label>
                                    <input name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="請輸入產品名稱" required>
                                </div>
                                <div class="field">
                                    <label>產品類別</label>
                                    <select name="C_name" class="form-control">
                                        <option value="" disabled="disabled" selected="selected">請選擇產品類別</option>
                                        @foreach($category as $category)
                                            <option id="C_name" value="{{$category->id}}" @if(old('C_name') == $category->id) selected="selected" @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="field">
                                    <label>產品規格</label>
                                        <textarea required id="specification" name="specification" style="resize:none;"　row="5" class="form-control"  placeholder="請輸入產品規格">{{old('specification')}}</textarea>
                                </div>
                                <div class="field">
                                    <label>單價</label>
                                    <input name="price" id="price" class="form-control" value="{{old('price')}}" placeholder="請輸入產品單價"required>
                                </div>
                                <div class="field">
                                    <label>單位</label>
                                    <input name="unit" id="unit" class="form-control" value="{{old('unit')}}" placeholder="請輸入產品單位"required>
                                </div>
                                <div class="field">
                                    <label>上傳產品照片</label>
                                    <input id="picture" type="file" class="form-control" name="picture" value="{{old('picture')}}" placeholder="上傳圖片"required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-left">
                                <button id="SubmitButtonId" type="submit" class="btn btn-success">新增</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($product as $product)
<div class="panel panel-default">
    <div class="panel-body">
        <div class="container-fluid" style="padding:0;">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="margin-top:0;"></h1>
                </div>
            </div>
            <img src="{{url('../storage/product/'. $product->picture)}}" style="border:2px green dashed;">
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
            <hr style="margin:10px 0;" />
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
        </div>
    </div>
</div>
    @endforeach
@endsection