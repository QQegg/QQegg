<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>test</title>

    <script type="text/javascript">
        function test(){
            client.responseID("推播數量");
            client.responseTitle("推播標題");
            client.responssContent("推播內文");
            //client 改為beaconid
            //連接controller找尋beaconID
            //回傳相應的 通知數 通知標題 通知內容
        }
    </script>
    <script> //timer countdown
        // 標準時間
        var countDownDate = new Date().getTime();
        // Update the count down every 1 second
        var x = setInterval(function() {
            // 比較時間
            var now = new Date().getTime();
            // 時間比較
            var distance = now - countDownDate;
            // 如果有超過固定時間 進行推播更新
            if (distance > 10) {
                test();
            }
        },1000);
    </script>
</head>
<body>
<br/>
<button onclick="test()">test</button>
</body>
</html>
