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
        <li><a href='{{ route('pushcreate') }}' >新增推播訊息</a></li>
    </ul>
</div>
<div class="container">
    <h2  class="text-center & text-success" ><strong>推播訊息管理</strong></h2>
    <hr class="colorgraph">
    <table class="table">
        <thead>
        <tr>
            <th>選項</th>
            <th>日期及時間</th>
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
                <td>{{$push->datetime}}</td>
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
