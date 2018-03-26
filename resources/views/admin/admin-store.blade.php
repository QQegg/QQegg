@extends('layouts.admin_app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Auth::guard('admin')->user()->account}}管理者，您正在管理頁面</div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >

                        <thead>
                        <tr>
                            <th width="30" style="text-align: center">id</th>
                            <th>店家名稱</th>
                            <th>聯絡人</th>
                            <th>信箱</th>
                            <th>電話</th>
                            <th>地址</th>
                            <th>圖片</th>
                            <th>使用權狀態</th>
                            <th width="100" style="text-align: center">關閉使用權</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $account)
                            <tr>
                                <td>{{$account->id}}</td>
                                <td>{{$account->name}}</td>
                                <td>{{$account->contact}}</td>
                                <td>{{$account->email}}</td>
                                <td>{{$account->phone}}</td>
                                <td>{{$account->address}}</td>
                                <td>{{($account->picture)?'已上傳':'尚未上傳'}}</td>
                                <td>{{($account->right)?'開啟':'停權'}}</td>
                                <td>
                                    <form action="{{ route('admin.status', $account->id) }}" method="POST">
                                        <a href ="{{route('admin.status', ['id'=>$account->id])}}"class="btn btn-success " role="button">開啟</a>
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger ">停權</button>
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