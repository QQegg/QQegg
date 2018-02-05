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
        <li><a href='{{ route('couponcreate') }}' >新增優惠券</a></li>
    </ul>
</div>

<div class="container">
    <h2  class="text-center & text-success" ><strong>優惠券管理</strong></h2>
    <hr class="colorgraph">
    <table class="table">
        <thead>
        <tr>

            <th>選項</th>
            <th>優惠券名稱</th>
            <th>起始時間</th>
            <th>結束時間</th>
            <th>功能</th>
        </tr>
        </thead>
        <tbody>
        @foreach($conpons as $conpon)
            <tr>
                <td><input type="checkbox" name="option" ></td>
                <td>{{$conpon->Conp_title}}</td>
                <td>{{$conpon->Conp_start}}</td>
                <td>{{$conpon->Conp_end}}</td>
                <td>
                    <form action="{{ route('condestroy', $conpon->id) }}" method="POST">
                        <a href="{{route('conview',$conpon->id)}}" class="text-success"><strong>詳細</strong></a>
                        /
                        <a href="{{route('conedit',$conpon->id)}}"  class="text-warning"><strong>編輯</strong></a>
                        /
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class=" btn-link"><strong>刪除</strong></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
