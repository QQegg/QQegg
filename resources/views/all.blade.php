<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>店家瀏覽頁面</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
</head>
<body>
<div style="overflow:auto;">
    <div id="wrapper" class="toggled">
        <div id="wrapper" >
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">
                            店家瀏覽頁面
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/coupon') }}">折價券</a>
                    </li>
                    <li>
                        <a href="{{ url('/push') }}">推播訊息</a>
                    </li>
                    <li>
                        <a href="{{ url('/product') }}">產品</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">交易紀錄</a>
                    </li>
                    <li>
                        <a href="{{ url('/') }}">修改店家基本資料</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="@container">
                        @yield('content')
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
    </div>
</div>
</body>
</html>
