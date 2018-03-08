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
        <li><a href='{{ route('coucreate') }}' >新增折價券</a></li>
    </ul>
</div>

<div class="container">
    <h2  class="text-center & text-success" ><strong>折價券管理</strong></h2>
    <hr class="colorgraph">
    <table class="table">
        <thead>
        <tr>

            <th>選項</th>
            <th>折價券名稱</th>
            <th>起始時間</th>
            <th>結束時間</th>
            <th>折扣金額</th>
            <th>至少購物金額</th>
            <th>功能</th>
        </tr>
        </thead>
        <tbody>
        @foreach($coupons as $coupon)
            <tr>
                <td><input type="checkbox" name="option" ></td>
                <td>{{$coupon->title}}</td>
                <td>{{$coupon->start}}</td>
                <td>{{$coupon->end}}</td>
                <td>{{$coupon->discount}}元</td>
                <td>{{$coupon->lowestprice}}元</td>
                <td>
                    <form action="{{ route('coudestroy', $coupon->id) }}" method="POST">
                        <a href="{{route('couview',$coupon->id)}}" class="text-success"><strong>詳細</strong></a>
                        /
                        <a href="{{route('couedit',$coupon->id)}}"  class="text-warning"><strong>編輯</strong></a>
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
