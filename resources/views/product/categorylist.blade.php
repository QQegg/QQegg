@extends('layouts.master')
@section('title','書籍觀看')
@section('content')
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container-fluid" style="padding:0;">
                <div style="position: relative;">
                    <button style="float: right" class="btn btn-info" data-toggle="modal"
                            data-target="#createcategory">+新增商品類別
                    </button>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="createcategory" role="dialog">
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


        <div class="container">
            <h2  class="text-center & text-success" ><strong>商品類別管理</strong></h2>
            <hr class="colorgraph">
            <table class="table">
                <thead>
                <tr>
                    <th>類別名稱</th>
                    <th>管理</th>
                </tr>
                </thead>

                <tbody>
                @foreach($category as $category)
                    <tr>
                        <td><h4>{{$category->name}}</h4></td>
                        <td>
                            <form class="delete" action="{{ route('catedestroy', $category->id) }}"method="POST" onsubmit="return ConfirmDelete()">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="submit" class="btn btn-danger" value="刪除">
                                <a href="{{route('cateedit',$category->id)}}" class="btn btn-success">修改</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
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
            </table>
            @if(count($category) == 0)
                <p class="text-center">
                    沒有任何商品類別
                </p>
            @endif
        </div>
    </body>
@endsection