@extends('layouts.master')
@section('title','書籍觀看')
@section('content')
    @if(count($category) == 0)
        <p class="text-center">
            沒有任何商品類別
        </p>

    @else
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container-fluid" style="padding:0;">
                    <div style="position: relative;">
                        <button style="float: right" class="btn btn-info" data-toggle="modal"
                                data-target="#createproduct">+新增商品類別
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="createproduct" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">新增產品類別</h4>
                        <button class="close" data-dismiss="modal">×</button>
                    </div>
                    <form action="{{route('catestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>類別名稱</label>
                                <input name="name" class="form-control" placeholder="請輸入產品類別">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-left">
                                <button type="submit" class="btn btn-success">新增</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        商品類別:
        @foreach($category as $category)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container-fluid" style="padding:0;">
                        <div class="row">
                            <div class="col-md-12">
                                <hr style="margin:10px 0;"/>
                                {{$category->name}}
                            </div>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form class="delete" action="{{ route('catedestroy', $category->id) }}" method="POST"
                                  onsubmit="return ConfirmDelete()">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                <input type="submit" class="btn btn-xs btn-danger" value="刪除">
                            </form>
                            <a href="{{route('cateedit',$category->id)}}" class="btn btn-success">修改</a>
                        </div>
                        <hr style="margin:10px 0;"/>
                        <script>
                            function ConfirmDelete() {
                                var x = confirm("你確定要刪除此產品類別嗎?");
                                if (x)
                                    return true;
                                else
                                    return false;
                            }
                        </script>

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
                    </div>
                </div>
            </div>
        @endforeach
    @endif


@endsection