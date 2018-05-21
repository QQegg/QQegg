@extends('layouts.master')

@section('content')
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
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

                    <div style="position: relative;">
                        <button style="float: right" class="btn btn-info" data-toggle="modal" data-target="#CreateAccount">+新增店家帳號</button>
                    </div>

                    <div class="modal fade" id="CreateAccount" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title & text-center & text-info">新增店家帳號</h4>
                                    <button class="close" data-dismiss="modal">×</button>
                                </div>
                                <form action="{{route('admin_store_account')}}" id="form" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">店家名稱</label>

                                            <div class="col-md-6">
                                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required>

                                                @if ($errors->has('name'))
                                                <span class="help-block">
                                                  <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">密碼</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label">請再次確認密碼</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-6 col-md-offset-4 & text-center">
                                            <button type="submit" class="btn btn-danger">
                                                確認新增
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <div class="panel panel-default">
                    <div class="panel-heading & text-center" style="text-align:center;" ><br><h3>店家詳細列表<br><small>Detailed list of stores</small></h3></div>
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
                    <script>
                        function ConfirmCreate()
                        {
                            var x = confirm("你確定要新增此帳號嗎?");
                            if (x)
                                return true;
                            else
                                return false;
                        }
                    </script>
            </div>
        </div>
    </div>
    </body>
@endsection