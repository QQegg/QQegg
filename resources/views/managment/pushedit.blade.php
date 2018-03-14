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
    <h2  class="text-center & text-success" ><strong>修改推播訊息</strong></h2>
        @foreach($pushs as $push)
            <form action="{{route('pushupdate', ['id'=>$push->id])}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

        <div class="form-group">
            <label>標題</label>
            <textarea name="title" class="form-control" rows="1" >{{$push->title}}</textarea>
        </div>
        <div class="form-group">
            <label>內容</label>
            <textarea name="content" class="form-control" rows="5" >{{$push->content}}</textarea>
        </div>
        <div class="form-group">
            <label>日期及時間</label>
            {{--<input type="datetime-local" name="P_timestamp" class="form-control" value="{{$push->P_timestamp}}">--}}
            <textarea name="datetime" class="form-control" rows="1" >{{$push->datetime}}</textarea>
        </div>
        <div class="form-group">
            <label>上傳圖片</label>
            <input type="file"  class="form-control " name="picture" id="picture" >
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary ">修改</button>
        </div>
            </form>
        </div>

    @endforeach
</div>
</div>
</html>