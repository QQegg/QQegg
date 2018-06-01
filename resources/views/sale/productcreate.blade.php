@extends('layouts.master')
@section('title','結帳')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class='container-fluid'>
    <input style="display:none" id="val" value=<?php echo $saleinfo?>>
        <input style="display:none" id="memp" value={{$re}}>

    @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="container">
                <h2  class="text-center & text-primary" style="font-family:標楷體" ><strong>購買商品</strong></h2>
                <hr class="colorgraph">
                <table class="table">
                    <thead>
                    <tr>
                        <th>名稱</th>
                        <th>單價</th>
                        <th>數量</th>
                        <th>金額</th>
                    </tr>
                    </thead>
                    <tbody>
            @if($salelist!=null)
                @foreach($salelist as $list)
                    <tr>
                        <td>{{$list->name}}</td>
                        <td>{{$list->price}}</td>
                        <td>{{$list->number}}</td>
                        <td>{{$list->total}}</td>
                    </tr>
                @endforeach
            @else
                <div class="col-md-12">
                    目前無商品列表
                </div>
            @endif
                    </tbody>
                </table>
            </div>
            <div class="progress-bar & bg-warning " style="width:100%;height:1px"></div>
                <h2 class=" text-right & text-danger "  style="font-family:標楷體 ;position: absolute; right:200pt "><strong>合計:{{$saleinfo}}元</strong> </h2>
            <form action="{{route('prestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
                {{ csrf_field() }}
                <br>
                <br>
                <div class="container ">
                    <h3 class="bg-info"   style="font-family:標楷體  "><strong>商品輸入</strong></h3>
                    ID :
                    <input  class="form-horizontal "  name="proid" autofocus />
                    數量 :
                <input class="form-horizontal"  name="number" value="1" />

                <div hidden>
                    <input  class="form-control"  name="Member_id" value={{$Member_id}} />
                </div>
                <button type="submit" class="btn btn-primary & form-horizontal">新增</button>
    </div>
            </form>
                <div class="container ">
                    <h3   class="bg-info" style="font-family:標楷體  "><strong>使用折價券折扣或積點折抵</strong></h3>
                    折價券 :

                    <select name="discount" id="dis">
                        <option value="0" selected="selected">請選擇要用的折價券</option>
                        @if(count($coupon_list)!=0){
                        @foreach($coupon_list as $coupon_list)
                            @if($coupon_list->first()->lowestprice<=$saleinfo)
                            <option value="{{$coupon_list->first()->discount}}">{{$coupon_list->first()->title}}</option>
                            @endif
                        @endforeach
                        }
                        @else{
                        <option value="0">無可用的折價券</option>
                        }
                        @endif
                    </select>
                    積點 :
                    <input class="form-horizontal "  name="point" id="poi"  placeholder="此會員可用積點:{{$point}}"/>
                    <button  id="myBtn" type="submit" class="btn btn-primary">結帳</button>


                </div>

        <script type="text/javascript">

            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                w=window.open();
                w.document.write(printContents);
                w.print();
                w.close();
            }</script>

                <div id="myModal" class="modal" >

                    <!-- Modal content -->

                    <div class="modal-content">
                        <div class="modal-content">
                            <div id="printModal"  >
                            <div class="modal-header">
                                <span class="close">x</span>
                                <h2>交易明細</h2>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>名稱</th>
                                        <th>單價</th>
                                        <th>數量</th>
                                        <th>金額</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($salelist!=null)
                                        @foreach($salelist as $list)
                                            <tr>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->price}}</td>
                                                <td>{{$list->number}}</td>
                                                <td>{{$list->total}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <div class="col-md-12">
                                            目前無商品列表
                                        </div>
                                    @endif
                                    </tbody>
                                </table>
                                <nobr>
                                    <h2 class=" text-right & text-danger"  style="font-family:標楷體"><strong>總計:<span id="inner"></span></strong></h2>
                                </nobr>
                                <h4   style="font-family:標楷體" >會員ID:{{$Member_id}}</h4>
                                <h4   style="font-family:標楷體" >至目前為止點數:{{$point}}</h4>
                                <h4   style="font-family:標楷體" > 本次新增:<span id="add"></span></h4>
                                <h4   style="font-family:標楷體" > 本次折抵:<span id="min"></span></h4>
                                <h4   style="font-family:標楷體" >累計點數:<span id="fin"></span></h4>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <form action="{{route('salestore')}}" method="POST" role="form" enctype="multipart/form-data" onsubmit="return ConfirmCreate()" >
                                    {{ csrf_field() }}
                                    <div style="display:none">
                                        <input class="form-control"  name="price" value="{{$saleinfo}}" />
                                    </div>

                                    <div style="display:none" >
                                        <input class="form-control"  name="Member" value="{{$Member_id}}" />
                                    </div>
                                    <div class="container ">
                                        <input style="display:none" class="form-control" id="disc" name="discount"/>
                                        <input class="form-horizontal" id="point" name="point" style="display:none"/>
                                        <button  type="submit" class=" btn btn-info & center-block" onclick="printDiv('printModal')">列印明細</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>


                </div>



            <!-- Trigger/Open The Modal -->
            <!-- The Modal -->


            <style>
                body {font-family: Arial, Helvetica, sans-serif;}
                /* Modal Header */
                .modal-header {
                    padding: 2px 16px;
                    background-color: #5cb85c;
                    color: white;
                }


            {{--<a href="{{route('salecreat')}}"><button type="submit" class="btn btn-success">下一筆</button></a>--}}

                /* Modal Footer */
                .modal-footer {
                    padding: 2px 16px;
                    background-color: #5cb85c;
                    color: white;
                }
                /* Modal Content */
                .modal-content {
                    position: relative;
                    background-color: #fefefe;
                    margin: auto;
                    padding: 0;
                    border: 1px solid #888;
                    width: 80%;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                    animation-name: animatetop;
                    animation-duration: 0.4s
                }
                /* Add Animation */
                @keyframes animatetop {
                    from {top: -300px; opacity: 0}
                    to {top: 0; opacity: 1}
                }
            </style>


    </div>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        /* Modal Header */
        .modal-header {
            padding: 2px 16px;
            background-color: #5bc0de;
            color: white;
        }
        /* Modal Body */
        .modal-body {padding: 2px 16px;}
        {{--<a href="{{route('salecreat')}}"><button type="submit" class="btn btn-success">下一筆</button></a>--}}

/* Modal Footer */
        .modal-footer {
            padding: 2px 16px;
            background-color: #FFFFFF;
            color: white;
        }
        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            animation-name: animatetop;
            animation-duration: 0.4s
        }
        /* Add Animation */
        @keyframes animatetop {
            from {top: -300px; opacity: 0}
            to {top: 0; opacity: 1}
        }
    </style>
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks the button, open the modal
        btn.onclick = function() {
            document.getElementById("disc").value = document.getElementById("dis").value;
            if (isNaN(parseInt(document.getElementById("poi").value)))
                document.getElementById("point").value=0;
            else
                document.getElementById("point").value =parseInt(document.getElementById("poi").value);
            document.getElementById("inner").textContent=(parseInt(document.getElementById('val').value)-parseInt(document.getElementById("dis").value))-parseInt(document.getElementById("point").value);
            document.getElementById("add").textContent=((parseInt(document.getElementById('val').value)-parseInt(document.getElementById("dis").value))-parseInt(document.getElementById("point").value))*0.01;
            document.getElementById("min").textContent=document.getElementById("point").value;
            document.getElementById("fin").textContent=parseInt({{$point}})+parseInt(document.getElementById("add").textContent)-parseInt(document.getElementById("min").textContent);
            modal.style.display = "block";
            document.getElementById("coupon").textContent=document.getElementById("point").value;

        }
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
@endsection
