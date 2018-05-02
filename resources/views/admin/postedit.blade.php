@extends('layouts.master')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>修改公告</h2></div>
                    <div class="panel-body">
                        @foreach ($post as $post)
                            <form action="/post/update/{{$post->id}}" method="POST" role="form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>標題：</label>
                                    <input name="title" class="form-control" placeholder="請輸入標題"
                                           value="{{$post->title}}">
                                </div>
                                <div class="form-group">
                                    <label>內文：</label>
                                    <textarea name="content" class="form-control" rows="5">{{$post->content}}</textarea>
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
    </div>

    <!-- /#page-content-wrapper -->
@endsection
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


