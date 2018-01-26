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

<div class="navbar-collapse collapse ">
    <ul class="nav navbar-nav">
        <li><a href='{{ route('pushlist') }}' >推播訊息管理</a></li>
    </ul>
</div>

<div class='container'>
    <form action="{{route('pushstore')}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h2  class="text-center & text-success" ><strong>新增推播訊息</strong></h2>

        <div class="form-group">
            <label>店家編號</label>
            <input name="S_id" class="form-control"  value="99">
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
            <textarea name="P_title" class="form-control" rows="1"></textarea>
        </div>
        <div class="form-group">
            <label>內容</label>
            <textarea name="P_content" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label>日期及時間</label>
            <input type="datetime-local" name="P_timestamp" class="form-control" >
        </div>
        <div class="form-group">
            <label>上傳圖片</label>
            <input type="file"  class="form-control" name="P_picture" id="P_picture" class="photo-input"></input>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary ">新增</button>
        </div>
    </form>
</div>

</body>
</html>