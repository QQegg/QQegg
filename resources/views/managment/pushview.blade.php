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
<div>

    <div class="navbar-collapse collapse ">
        <ul class="nav navbar-nav">
            <li><a href='{{ route('pushlist') }}' >推播訊息管理</a></li>
        </ul>
    </div>

    <div class='container'>
        <h2  class="text-center & text-success" ><strong>檢視推播訊息</strong></h2>
        @foreach($pushs as $push)

                <div class="form-group">
                    <label>標題</label>
                    <p>{{$push->title}}</p>
                </div>
                <div class="form-group">
                    <label>內容</label>
                    <p >{{$push->content}}</p>
                </div>
                <div class="form-group">
                    <label>起始日期</label>
                    <p>{{$push->date_start}}</p>
                </div>
            <div class="form-group">
                <label>結束日期</label>
                <p>{{$push->date_end}}</p>
            </div>
            <div class="form-group">
                <label>起始時間</label>
                <p>{{$push->time_start}}</p>
            </div>
            <div class="form-group">
                <label>結束時間</label>
                <p>{{$push->time_end}}</p>
            </div>
                <div class="form-group">
                    <img src="{{url('../storage/push/'. $push->picture)}}" >
                {{--<div class="text-right">--}}
                    {{--<button type="submit" class="btn btn-primary ">修改</button>--}}
                {{--</div>--}}
    </div>
    @endforeach
</div>
</div>
</html>
@endsection