<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>公告編輯</title>
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
                    <a href="{{route('admin.index')}}">
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
                        @foreach ($post as $post)
                            <form action="/post/update/{{$post->id}}" method="POST" role="form">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <label>標題：</label>
                                    <input name="title" class="form-control" placeholder="請輸入標題" value="{{$post->title}}">
                                </div>
                                <div class="form-group">
                                    <label>內文：</label>
                                    <textarea name="content" class="form-control" rows="1">{{$post->content}}</textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">修改完成</button>
                                </div>
                            </form>
                        @endforeach
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
