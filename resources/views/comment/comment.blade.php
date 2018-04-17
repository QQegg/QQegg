<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>公告管理</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
</head>
<body>
<div id="wrapper" class="toggled">
    <div id="wrapper" >
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a>
                    留言功能
                    </a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="@container">
<div class='container'>
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
                            @if($com->M_id==null)
                                <h1 style="margin-top:0;">{{ $com->S_id}}</h1>
                            @else
                                <h1 style="margin-top:0;">{{ $com->M_id}}</h1>
                            @endif
                        </div>
                    </div>
                    <hr style="margin:10px 0;" />
                    <div class="row">
                        <div class="col-md-12">
                            {{ $com->Cmt_content}}
                        </div>
                    </div>
                    @if(Auth::user()->id == $com->M_id)
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-12">
                            <a href="{{route('postedit',['id'=>$posts->id]) }}" class="btn btn-xs btn-danger">修改</a>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-12">
                            <a href="{{route('postdestroy',['id'=>$posts->id]) }}" class="btn btn-xs btn-danger">刪除</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
        @if(Auth::guard('store')->check())
        <form action="/post/store" method="POST" role="form">
            {{ csrf_field()}}
            <div class="form-group">
                <label>內容</label>
                <textarea name="Cmt_content" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group" style= display:none >
                <textarea name="M_id" class="form-control" rows="0" value=Auth::user()->id></textarea>
            </div>
            <select name="Cmt_rating">
                　<option value="1">1</option>
                　<option value="2">2</option>
                　<option value="3">3</option>
                　<option value="4">4</option>
                　<option value="5">5</option>
            </select>
            <div class="text-right">
            <button type="submit" class="btn btn-success">新增</button>
        </div>
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
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bumdle.min.js')}}"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>