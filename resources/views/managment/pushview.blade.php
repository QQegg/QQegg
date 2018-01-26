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
                <div class="form-group">
                    <label>店家編號</label>
                    <p>{{$push->S_id}}</p>
                </div>
                <div class="form-group">
                    <label>類別</label>
                    <p>@if($push->Cate_id == 1)
                            女生服飾
                        @elseif ($push->Cate_id == 2)
                            男生服飾
                        @elseif ($push->Cate_id == 3)
                            美妝保健
                        @elseif ($push->Cate_id == 4)
                            手機平板與周邊
                        @elseif ($push->Cate_id == 5)
                            嬰幼童與母親
                        @elseif ($push->Cate_id == 6)
                            3C
                        @elseif ($push->Cate_id == 7)
                            居家生活
                        @elseif ($push->Cate_id == 8)
                            家電影音
                        @elseif ($push->Cate_id == 9)
                            戶外與運動用品
                        @elseif ($push->Cate_id == 10)
                            美食、伴手禮
                        @elseif ($push->Cate_id == 11)
                            汽機車零件百貨
                        @elseif ($push->Cate_id == 12)
                            寵物
                        @elseif ($push->Cate_id == 13)
                            娛樂
                        @endif</p>
                </div>
                <div class="form-group">
                    <label>標題</label>
                    <p>{{$push->P_title}}</p>
                </div>
                <div class="form-group">
                    <label>內容</label>
                    <p >{{$push->P_content}}</p>
                </div>
                <div class="form-group">
                    <label>日期及時間</label>
                    {{--<input type="datetime-local" name="P_timestamp" class="form-control" value="{{$push->P_timestamp}}">--}}
                    <p>{{$push->P_timestamp}}</p>
                </div>
                <div class="form-group">
                    <img src="{{url('../storage/push/'. $push->P_picture)}}" width="300px" height="200px">
                <div class="text-right">
                    <button type="submit" class="btn btn-primary ">修改</button>
                </div>
    </div>
    @endforeach
</div>
</div>
</html>