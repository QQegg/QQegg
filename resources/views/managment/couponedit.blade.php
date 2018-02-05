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
            <li><a href='{{ route('conlist') }}' >優惠券管理</a></li>
        </ul>
    </div>

    <div class='container'>
        <h2  class="text-center & text-success" ><strong>修改優惠券</strong></h2>
        @foreach($conpons as $conpon)
            <form action="{{route('conponupdate', ['id'=>$push->id])}}" method="POST" role="form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label>店家編號</label>
                    <input name="S_id" class="form-control"  value="{{$conpon->S_id}}">
                </div>

                <div class="form-group">
                    <label>標題</label>
                    <textarea name="Conp_title" class="form-control" rows="1" >{{$conpon->Conp_title}}</textarea>
                </div>
                <div class="form-group">
                    <label>內容</label>
                    <textarea name="Conp_content" class="form-control" rows="5" >{{$conpon->Conp_content}}</textarea>
                </div>
                <div class="form-group">
                    <label>起始時間</label>
                    <textarea name="Conp_start" class="form-control" rows="1" >{{$conpon->Conp_start}}</textarea>
                </div>
                <div class="form-group">
                    <label>結束時間</label>
                    <textarea name="Conp_end" class="form-control" rows="1" >{{$conpon->Conp_end}}</textarea>
                </div>
                <div class="form-group">
                    <label>上傳圖片</label>
                    <input type="file"  class="form-control" name="Conp_picture" id="Conp_picture" class="photo-input" value="{{$push->Conp_picture}}">
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