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
                    <a href="{{route('postlist')}}">
                        管理後台
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
    @if(count($posts) == 0)
        <p class="text-center">
            沒有任何公告
        </p>
    @endif
    @foreach ($posts as $posts)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="container-fluid" style="padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 style="margin-top:0;">{{ $posts->title }}</h1>
                        </div>
                    </div>
                    <hr style="margin:10px 0;" />
                    <div class="row">
                        <div class="col-md-12">
                            內文:
                            {{ $posts->content }}
                        </div>
                    </div>
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
                </div>
            </div>
        </div>
    @endforeach
    <form action="/post/store" method="POST" role="form">
        {{ csrf_field()}}
        <div class="form-group">
            <label>標題</label>
            <input name="title" class="form-control" placeholder="請標題">
        </div>
        <div class="form-group">
            <label>內容</label>
            <textarea name="content" class="form-control" rows="5"></textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-success">新增</button>
        </div>
    </form>
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