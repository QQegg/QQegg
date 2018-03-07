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
            <form action="{{route('pushupdate', ['id'=>$push->id])}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
            <label>店家編號</label>
            <input name="S_id" class="form-control"  value="{{$push->S_id}}">
        </div>
        <div class="form-group">
            <label>類別</label>
            <select name="Cate_id" class="form-control">
                　<option value="1">女生服飾</option>
                　<option value="2">男生服飾</option>
                　<option value="3">美妝保健</option>
                　<option value="4">手機平板與周邊</option>
                　<option value="5">嬰幼童母親</option>
                　<option value="6">3C</option>
                　<option value="7">居家生活</option>
                　<option value="8">家電影音</option>
                　<option value="9">戶外與運動用品</option>
                　<option value="10">美食、伴手禮</option>
                　<option value="11">汽機車零件百貨</option>
                　<option value="12">寵物</option>
                　<option value="13">娛樂</option>
                　
            </select>
        </div>
        <div class="form-group">
            <label>標題</label>
            <textarea name="P_title" class="form-control" rows="1" >{{$push->P_title}}</textarea>
        </div>
        <div class="form-group">
            <label>內容</label>
            <textarea name="P_content" class="form-control" rows="5" >{{$push->P_content}}</textarea>
        </div>
        <div class="form-group">
            <label>日期及時間</label>
            {{--<input type="datetime-local" name="P_timestamp" class="form-control" value="{{$push->P_timestamp}}">--}}
            <textarea name="P_timestamp" class="form-control" rows="1" >{{$push->P_timestamp}}</textarea>
        </div>
        <div class="form-group">
            <label>上傳圖片</label>
            <input type="file"  class="form-control" name="P_picture" id="P_picture" class="photo-input" >
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