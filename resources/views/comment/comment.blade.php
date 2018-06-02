@extends('layouts.master')
@section('title','書籍觀看')
@section('content')
        <!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>回覆留言</h2></div>
                    <div class="panel-body">
                        @if(count($com) == 0)
                            <p class="text-center">
                                沒有任何評論
                            </p>
                        @endif
                        @foreach ($com as $com)
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="container-fluid" style="padding:0;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 style="margin-top:0;">{{$com->member_name}}的評論</h1>
                                            </div>
                                        </div>
                                        <hr style="margin:10px 0;"/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                你的回應：{{ $com->Store_comment}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:10px;">
                                                <div class="col-md-12">
                                                    @if($com['Store_comment'] == null)
                                                    <a href="{{route('comdestroy',$com->Member_id)}}"
                                                       class="btn btn-danger" disabled>刪除</a>
                                                        @else
                                                        <a href="{{route('comdestroy',$com->Member_id)}}"
                                                           class="btn btn-danger">刪除</a>
                                                        @endif
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            @if(Auth::guard('store')->check())
                                <form action="{{route('comstore')}}" method="POST" role="form">
                                    {{ csrf_field()}}
                                    <div class="form-group">
                                        <label>內容</label>
                                        <textarea name="content" class="form-control" rows="5" required></textarea>
                                    </div>
                                    <label>請選擇要回復的消費者</label>
                                    <select name="Member_id" required>
                                        @if(empty($iscomment))
                                            <option value="" disabled="disabled" selected="selected">目前沒有可以回應的對象</option>
                                            @else
                                            <option value="" disabled="disabled" selected="selected">請選擇要回覆的會員</option>
                                        @foreach($iscomment as $iscomment)
                                            @if(empty($iscomment))
                                                @else
                                                <option value="{{$iscomment->id}}">{{$iscomment->name}}</option>
                                                @endif
                                        @endforeach
                                            @endif
                                    </select>

                                    @if(empty($iscomment))
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success" disabled>新增</button>
                                    </div>
                                        @else
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success">新增</button>
                                        </div>
                                    @endif
                                </form>

                            @else
                                <p class="text-center">
                                    請先登入才能留言
                                </p>

                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bumdle.min.js')}}"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>
@endsection