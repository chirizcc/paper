<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/1.1.1/weui.min.css">
    <link rel="{{asset('/resources/css/public.css')}}">
    <title>社区交流</title>
</head>
<body ontouchstart>
<div class="weui-msg">
    <div class="weui-msg__icon-area"><i class="weui-icon-warn  weui-icon_msg"></i></div>
    <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">{{ $message  }}</h2>
        <p class="weui-msg__desc"><span id="time">{{ $time }}</span>秒后返回</p>
    </div>
    <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
            <a href="{{ $url }}" class="weui-btn weui-btn_primary">返回</a>
        </p>
    </div>
</div>
</body>
<script src="{{asset('/resources/js/jquery-3.1.1.min.js')}}"></script>
<script>

    jump({{ $time  }})

    function jump(time) {
        if (time >= 0) {
            $('#time').html(time);
            setTimeout('jump('+ --time +')', 1000);

            console.log(time);
        } else {
            window.location.href = '{{ $url }}';
        }
    }
</script>
</html>