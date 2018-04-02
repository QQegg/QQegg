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
                    <div class="panel-heading"><h2>{{ Auth::guard('admin')->user()->name}} 修改密碼</h2></div>
                    <div class="panel-body">
                        @foreach($accounts as $account)
                        <form action="{{route('admin_store_change_password', ['id'=>$account->id])}}" method="POST" role="form" >
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <label for="name" class="col-md-4 control-label">店家名稱</label>

                            <div class="col-md-6">
                                <label for="name" class="col-md-4 control-label">{{$account->name}}</label>
                            </div>
                            {{--passwordold--}}
                            <div class="form-group{{ $errors->has('passwordold') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">old 密碼</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="passwordold" required>

                                    @if ($errors->has('passwordold'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('passwordold') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{--passwordnew--}}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">new 密碼</label>

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
                                <label for="password-confirm" class="col-md-4 control-label">請再次輸入密碼</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-blue">
                                        修改密碼
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
