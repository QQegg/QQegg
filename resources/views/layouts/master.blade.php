{{--@include('layouts.store_app')--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sailor - Bootstrap 3 corporate template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Bootstrap 3 template for corporate business" />
    <!-- css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/flexslider/flexslider.css')}}" rel="stylesheet" media="screen" />
    <link href="{{asset('css/cubeportfolio.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />

    <!-- Theme skin -->
    <link id="t-colors" href="skins/default.css" rel="stylesheet" />

    <!-- boxed bg -->
    <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />

    <!-- =======================================================
    Theme Name: Sailor
    Theme URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
    ======================================================= -->

</head>

<body>

<div id="wrapper">
    <!-- start header -->
    <header>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="topleft-info">
                            <a  href="index.html" align="top">
                                <nobr>
                                <img src="img/logo2.png" alt="" width="150" height="150" style="float:left;margin:5pt"  />
                                <h1 style="position: absolute; left:120pt ;top:25pt">商圈促銷資訊就近推播系統</h1>
                                </nobr>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('prolist')}}">商品管理</a></li>
                        <li><a href="{{route('pushlist')}}">促銷訊息管理</a></li>
                        <li><a href="{{route('coulist')}}">折價券</a></li>
                        <li><a href="#">交易紀錄</a></li>
                        <li><a href="{{route('store.login')}}">店家登入</a></li>
                        <li><a href="{{route('admin.login')}}">管理者登入</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
</div>


@yield('content')
<!--footer-->
@include('layouts.partials.footer')

<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/modernizr.custom.js')}}"></script>
<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/flexslider/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('plugins/flexslider/flexslider.config.js')}}"></script>
<script src="{{asset('js/jquery.appear.js')}}"></script>
<script src="{{asset('js/stellar.js')}}"></script>
<script src="{{asset('js/classie.js')}}"></script>
<script src="{{asset('js/uisearch.js')}}"></script>
<script src="{{asset('js/jquery.cubeportfolio.min.js')}}"></script>
<script src="{{asset('js/google-code-prettify/prettify.js')}}"></script>
<script src="{{asset('js/animate.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

</body>
</html>
