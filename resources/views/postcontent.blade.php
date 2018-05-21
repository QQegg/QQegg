@extends('layouts.master')

@section('title', 'HOME')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>公告內容</h2></div>
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
                                                <h3>內文:</h3>
                                                <h4>{{ $posts->content }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
    {{--<footer>--}}

@endsection