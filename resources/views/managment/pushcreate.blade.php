<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function ConfirmCreate()
        {
            var x = confirm("你確定要新增此促銷訊息嗎?");
            if (x)
                return true;
            else
                return false;
        }
    </script>


</head>
<body>

<div class="navbar-collapse collapse ">
    <ul class="nav navbar-nav">
        <li><a href='{{ route('pushlist') }}' >推播訊息管理</a></li>
    </ul>
</div>

<div class='container'>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('pushstore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()">
        {{ csrf_field() }}
        <h2  class="text-center & text-success" ><strong>新增推播訊息</strong></h2>


        <div class="form-group">
            <label>標題</label>
            <textarea name="title" class="form-control" rows="1"></textarea>
        </div>

        <select name="discount" id="dis">
            <option value="0" selected="selected">請選擇商品</option>
            @foreach($prod as $ev)
                <option value={{$ev->id}} selected="selected">{{$ev->name}}</option>
            @endforeach
        </select>

        <div class="form-group">
            <label>標題</label>
            <textarea name="discount" class="form-control" rows="1"></textarea>
        </div>

        <div class="form-group">
            <label>內容</label>
            <textarea name="content" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label>起始日期</label>
            <input type="datetime-local" name="date_start" class="form-control" >
        </div>
        <div class="form-group">
            <label>結束日期</label>
            <input type="datetime-local" name="date_end" class="form-control" >
        </div>
        <div class="form-group">
            <label>起始時間</label>
            <input type="datetime-local" name="time_start" class="form-control" >
        </div>
        <div class="form-group">
            <label>結束時間</label>
            <input type="datetime-local" name="time_end" class="form-control" >
        </div>
        <div class="form-group">
            <label>上傳圖片</label>
            <input type="file"  class="form-control " name="picture" id="picture" >
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary ">新增</button>
        </div>
    </form>
</div>

</body>
</html>