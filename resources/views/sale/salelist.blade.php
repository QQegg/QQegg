@extends('layouts.master')
@section('title','消費紀錄觀看')
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
        <h2  class="text-center & text-success" ><strong>交易紀錄</strong></h2>
        <hr class="colorgraph">
        <table class="table">
            <thead>
            <tr>
                <th>圖片</th>
                <th>商品名稱</th>
                <th>管理</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td><img src="#" width="200" height="200" style="border:2px green dashed;"></td>
                    <td><h4></h4></td>
                    <td>
                        <form class="delete" action="#" method="POST" onsubmit="return ConfirmDelete()">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="submit" class="btn btn-danger" value="產品下架">
                            <a href="#" class="btn btn-success">觀看產品詳細資訊</a>
                        </form>
                    </td>
                </tr>
            </tbody>
            <script>
                function ConfirmDelete()
                {
                    var x = confirm("你確定要刪除此產品嗎?");
                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>

            <script>
                function ConfirmCreate()
                {
                    var x = confirm("你確定要新增此產品嗎?");
                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>
        </table>

            <p class="text-center">
                沒有任何商品
            </p>

    </div>
    </body>
@endsection