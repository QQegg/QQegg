@extends('layouts.master')
@section('title','消費者ID')
@section('content')

    <form action="{{route('costomersave')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
    {{ csrf_field() }}
    <div class="form-group">
        <h3 class="bg-info"   style="font-family:標楷體  "><strong>會員輸入</strong></h3>
        <input name="Member_id" class="form-horizontal" placeholder="請輸入會員" autofocus>
        <button type="submit" class="btn btn-primary &  form-horizontal">確認</button>

    </div>


    </form>

@endsection