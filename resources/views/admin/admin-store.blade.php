@extends('layouts.master')

@section('content')
    <div class="container">
        <ol class="breadcrumb breadco">
            <li class="fa fa-home"><a href="{{route('index')}}"> Home</a></li>
            <li class="active">管理店家</li>
        </ol>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif

                <form action="{{route('admin.create')}}">
                    <div style="position: relative;" >
                        <button style="float: right" class="btn btn-info" >+新增店家</button>
                    </div>
                </form>

                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align:center;color: white;" ><h3>店家詳細列表<br><small>Detailed list of stores</small></h3></div>
                    {{--<div class="panel-heading">{{ Auth::guard('admin')->user()->account}}管理者，您正在管理頁面</div>--}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                        <tr>
                            <th width="30" style="text-align: center">id</th>
                            <th style="text-align: center">店家名稱</th>
                            <th style="text-align: center">聯絡人</th>
                            <th style="text-align: center">信箱</th>
                            <th style="text-align: center">電話</th>
                            <th style="text-align: center">地址</th>
                            <th style="text-align: center">圖片</th>
                            <th style="text-align: center">使用權狀態</th>
                            <th width="100" style="text-align: center">開啟/停權</th>
                            <th width="100" style="text-align: center">功能</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $account)
                            <tr>
                                <td align="center">{{$account->id}}</td>
                                <td align="center">{{$account->name}}</td>
                                <td align="center">{{$account->contact}}</td>
                                <td align="center">{{$account->email}}</td>
                                <td align="center">{{$account->phone}}</td>
                                <td align="center">{{$account->address}}</td>
                                <td align="center">{{($account->picture)?'已上傳':'尚未上傳'}}</td>
                                <td align="center">{{($account->right)?'正常使用中':'停權'}}</td>
                                <td>
                                    <form action="{{ route('admin.status', $account->id) }}" method="POST">
                                        <a href ="{{route('admin.status', ['id'=>$account->id])}}" class="btn btn-success " type="submit" role="button">{{($account->right)?'停權':'開啟'}}</a>
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.destroy', $account->id) }}" method="POST">
                                        <a href="{{route('admin.admin-store-view',$account->id)}}" class="text-success"><strong>修改密碼</strong></a>
                                        /{{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class=" btn-link" style="color:red;"><strong>刪除帳號</strong></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection