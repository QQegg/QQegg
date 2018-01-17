@extends('notification.layout.master')
@section('title','推播觀看')
@section('content')
    <div class='container'>
        @if(count($push) == 0)
            <p class="text-center">
            無已設定推播訊息
            </p>
        @endif
            @foreach ($push as $push)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container-fluid" style="padding:0;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 style="margin-top:0;">{{ $push->P_title }}</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    內容:
                                    {{ $push->P_content}}
                                </div>
                            </div>
                            <hr style="margin:10px 0;" />
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    類別類別編號:
                                    {{ $push->Cate_id}}
                                </div>
                            </div>
                            <hr style="margin:10px 0;" />
                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-12">
                                    <a href="{{route('notiedit',['id'=>$push->id]) }}" class="btn btn-xs btn-danger">產品修改</a>
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-12">
                                    <a href="{{route('notidestroy',['id'=>$push->id]) }}" class="btn btn-xs btn-danger">產品下架</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
@endsection