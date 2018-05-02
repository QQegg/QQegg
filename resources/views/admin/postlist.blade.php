@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>發布公告</h2></div>
                    <div class="panel-body">
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
                                        <hr style="margin:10px 0;"/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                內文:
                                                {{ $posts->content }}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:10px;">
                                            <div class="col-md-12">
                                                <a href="{{route('postedit',['id'=>$posts->id]) }}"
                                                   class="btn btn-xs btn-danger">修改</a>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:10px;">
                                            <div class="col-md-12">
                                                <a href="{{route('postdestroy',['id'=>$posts->id]) }}"
                                                   class="btn btn-xs btn-danger">刪除</a>
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
                                <input name="title" class="form-control" placeholder="請輸入標題" required>
                            </div>
                            <div class="form-group">
                                <label>內容</label>
                                <textarea name="content" class="form-control" rows="5" placeholder="請輸內容" required></textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success">新增</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /#page-content-wrapper -->

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

@endsection
