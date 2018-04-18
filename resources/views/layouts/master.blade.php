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
        <div class="top" style="background-color:white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="topleft-info">

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a  href="{{route('index')}}" align="top">
                        <nobr>
                            <img src="img/logo2.png" alt="" width="150" height="150" style="float:left;margin:5pt"  />
                            <h1 style="position: absolute; left:400pt ;top:20pt">資訊推播商圈</h1>
                        </nobr>

                    </a>
                </div>
                @if(Auth::guard('store')->check())
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li font-size="15"><a href="{{route('prolist')}}">商品管理</a></li>
                        <li><a href="{{route('pushlist')}}">促銷訊息管理</a></li>
                        <li><a href="{{route('coulist')}}">折價券</a></li>
                        <li><a href="#">交易紀錄</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                您好 !  <strong>{{ Auth::guard('store')->user()->name}}</strong> 店家   <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{route('store_change_password')}}">修改密碼</a>
                                    <a href="{{route('store_change_profile')}}">修改基本資料</a>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        登出
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @elseif(Auth::guard('admin')->check())
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li font-size="15"><a href="{{route('postlist')}}">公告</a></li>
                            <li><a href="{{route('admin.index')}}">管理店家</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    您好 !  <strong>{{ Auth::guard('admin')->user()->account}}</strong> 管理者   <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        {{--<a href="{{route('store_change_password')}}">修改密碼</a>--}}
                                        {{--<a href="{{route('store_change_profile')}}">修改基本資料</a>--}}
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            登出
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('store.login')}}">店家登入</a></li>
                            <li><a href="{{route('admin.login')}}">管理者登入</a></li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </header>
    <!-- end header -->
</div>


@yield('content')
<!--footer-->
@include('layouts.partials.footer')

<a href="#" class="scrollup" style="background-color:white"><i class="fa fa-angle-up active"></i></a>

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
