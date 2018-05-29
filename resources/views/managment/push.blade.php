@extends('layouts.master')
@section('title','書籍觀看')
@section('content')
<!DOCTYPE html>
<html lang="en">
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
                <button style="float: right" class="btn btn-info" data-toggle="modal" data-target="#createproduct">+新增推播訊息</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createproduct" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h2 class="modal-title & text-center & text-info"><strong>新增推播訊息</strong></h2>

            </div>
            <form action="{{route('pushstore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()">
                {{ csrf_field() }}
                <div class="modal-body">


                <div class="form-group">
                    <label>標題</label>
                    <textarea name="title" class="form-control" rows="1"></textarea>
                </div>
                <div class="form-group">
                    <label>內容</label>
                    <textarea name="content" class="form-control" rows="5"></textarea>
                </div>
                    <div class="form-group">
                        <label>起始日期</label>
                        <input type="date" name="date_start" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>結束日期</label>
                        <input type="date" name="date_end" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>起始時間</label>
                        <input type="time" name="time_start" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>結束時間</label>
                        <input type="time" name="time_end" class="form-control" >
                    </div>
                <div class="form-group">
                    <label>上傳圖片</label>
                    <input type="file"  class="form-control " name="picture" id="picture" >
                </div>
                </div>
                <div class="modal-footer">
                <div class="text-right">
                    <button type="submit" class="btn btn-primary ">新增</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <h2  class="text-center & text-success" ><strong>推播訊息管理</strong></h2>
    <hr class="colorgraph">
    <table class="table">
        <thead>
        <tr>
            <th>選項</th>
            <th>起始日期~結束日期</th>
            <th>起始時間~結束時間</th>
            <th>推播訊息名稱</th>
            <th>狀態</th>
            <th>功能</th>
            <th>推播</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pushs as $push)
            <tr>
                <td><input type="checkbox" name="option" ></td>
                <td>{{$push->date_start}}~{{$push->date_end}}</td>
                <td>{{$push->time_start}}~{{$push->time_end}}</td>
                <td>{{$push->title}}</td>
                <td><a class="text-danger"><strong>{{$push->statue}}</strong></a></td>
                <td >
                    <button class="btn btn-success "><a href="{{route('pushview',$push->id)}}" style="color: white" ><strong>詳細</strong></a></button>
                    <button class="btn btn-warning "><a href="{{route('pushedit',$push->id)}}" style="color: white" ><strong>編輯</strong></a></button>
                        {{--<form action="{{ route('pushdestroy', $push->id) }}" method="POST">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--{{ method_field('DELETE') }}--}}
                    <button  class=" btn btn-danger "><a href="{{route('pushdestroy',$push->id)}}" style="color: white"><strong>刪除</strong></a></button>
                        {{--</form>--}}
                </td>
                <td><button class="btn btn-primary "><a href="{{route('pushchange',$push->id)}}" style="color:white" ><strong>更改推播狀態</strong></a></button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
@endsection