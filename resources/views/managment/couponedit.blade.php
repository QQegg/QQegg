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
            <li><a href='{{ route('coulist') }}' >折價券管理</a></li>
        </ul>
    </div>

    <div class='container'>
        <h2  class="text-center & text-success" ><strong>修改折價券</strong></h2>
        @foreach($coupons as $coupon)
            <form action="{{route('couupdate', ['id'=>$coupon->id])}}" method="POST" role="form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label>店家編號</label>
                    <input name="S_id" class="form-control"  value="{{$coupon->S_id}}">
                </div>

                <div class="form-group">
                    <label>標題</label>
                    <textarea name="Coup_title" class="form-control" rows="1" >{{$coupon->Coup_title}}</textarea>
                </div>
                <div class="form-group">
                    <label>內容</label>
                    <textarea name="Coup_content" class="form-control" rows="5" >{{$coupon->Coup_content}}</textarea>
                </div>
                <div class="form-group">
                    <label>起始時間</label>
                    <textarea name="Coup_start" class="form-control" rows="1" >{{$coupon->Coup_start}}</textarea>
                </div>
                <div class="form-group">
                    <label>結束時間</label>
                    <textarea name="Coup_end" class="form-control" rows="1" >{{$coupon->Coup_end}}</textarea>
                </div>
                <div class="form-group">
                    <label>上傳圖片</label>
                    <input type="file"  class="form-control" name="Coup_picture" id="Coup_picture" class="photo-input" value="{{$coupon->Coup_picture}}">
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