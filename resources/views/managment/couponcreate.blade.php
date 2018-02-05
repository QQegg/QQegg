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
        <li><a href='{{ route('conlist') }}' >優惠券訊息管理</a></li>
    </ul>
</div>

<div class='container'>
    <form action="{{route('coustore')}}" method="POST" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h2  class="text-center & text-success" ><strong>新增優惠券</strong></h2>

        <div class="form-group">
            <label>店家編號</label>
            <input name="S_id" class="form-control"  value="99">
        </div>
        <div class="form-group">
            <label>標題</label>
            <textarea name="Conp_title" class="form-control" rows="1"></textarea>
        </div>
        <div class="form-group">
            <label>內容</label>
            <textarea name="Conp_content" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label>起始時間</label>
            <input type="datetime-local" name="Conp_start" class="form-control" >
        </div>
        <div class="form-group">
            <label>結束時間</label>
            <input type="datetime-local" name="Conp_end" class="form-control" >
        </div>
        <div class="form-group">
            <label>上傳圖片</label>
            <input type="file"  class="form-control " name="Conp_picture" id="Conp_picture" >
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary ">新增</button>
        </div>
    </form>
</div>

</body>
</html>