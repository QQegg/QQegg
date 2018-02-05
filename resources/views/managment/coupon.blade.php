{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<title>Bootstrap Example</title>--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="navbar-collapse collapse ">--}}
    {{--<ul class="nav navbar-nav">--}}
        {{--<li><a href='{{ route('couponcreate') }}' >新增優惠券</a></li>--}}
    {{--</ul>--}}
{{--</div>--}}

{{--<div class="container">--}}
    {{--<h2  class="text-center & text-success" ><strong>優惠券管理</strong></h2>--}}
    {{--<hr class="colorgraph">--}}
    {{--<table class="table">--}}
        {{--<thead>--}}
        {{--<tr>--}}

            {{--<th>選項</th>--}}
            {{--<th>優惠券名稱</th>--}}
            {{--<th>起始時間</th>--}}
            {{--<th>結束時間</th>--}}
            {{--<th>功能</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach($pushs as $push)--}}
            {{--<tr>--}}
                {{--<td><input type="checkbox" name="option" ></td>--}}
                {{--<td>{{$push->P_timestamp}}</td>--}}
                {{--<td>@if($push->Cate_id == 1)--}}
                        {{--女生服飾--}}
                    {{--@elseif ($push->Cate_id == 2)--}}
                        {{--男生服飾--}}
                    {{--@elseif ($push->Cate_id == 3)--}}
                        {{--美妝保健--}}
                    {{--@elseif ($push->Cate_id == 4)--}}
                        {{--手機平板與周邊--}}
                    {{--@elseif ($push->Cate_id == 5)--}}
                        {{--嬰幼童與母親--}}
                    {{--@elseif ($push->Cate_id == 6)--}}
                        {{--3C--}}
                    {{--@elseif ($push->Cate_id == 7)--}}
                        {{--居家生活--}}
                    {{--@elseif ($push->Cate_id == 8)--}}
                        {{--家電影音--}}
                    {{--@elseif ($push->Cate_id == 9)--}}
                        {{--戶外與運動用品--}}
                    {{--@elseif ($push->Cate_id == 10)--}}
                        {{--美食、伴手禮--}}
                    {{--@elseif ($push->Cate_id == 11)--}}
                        {{--汽機車零件百貨--}}
                    {{--@elseif ($push->Cate_id == 12)--}}
                        {{--寵物--}}
                    {{--@elseif ($push->Cate_id == 13)--}}
                        {{--娛樂--}}
                    {{--@endif </td>--}}

                {{--<td>{{$push->P_title}}</td>--}}
                {{--<td>--}}
                    {{--<form action="{{ route('pushdestroy', $push->id) }}" method="POST">--}}
                        {{--<a href="{{route('pushview',$push->id)}}" class="text-success"><strong>詳細</strong></a>--}}
                        {{--/--}}
                        {{--<a href="{{route('pushedit',$push->id)}}"  class="text-warning"><strong>編輯</strong></a>--}}
                        {{--/--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--<button class=" btn-link"><strong>刪除</strong></button>--}}
                    {{--</form>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
    {{--</table>--}}
{{--</div>--}}

{{--</body>--}}
{{--</html>--}}
