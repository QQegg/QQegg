@extends('product.layout.master')
@section('title','消費者ID')
@section('content')

    <form action="{{route('costomersave')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
    {{ csrf_field() }}
    <div class="form-group">
        <input name="Member_id" class="form-control" placeholder="請輸入消費者ID">
    </div>
    <button type="submit" class="btn btn-success">確認</button>
    </form>
@endsection