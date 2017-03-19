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
<!-- 按钮两侧留有空隙 -->
<div class="weui-btn-area">
    <a href="#" class="weui-btn weui-btn_primary">住户管理</a>
</div>

<div class="weui-btn-area">
    <a href="#" class="weui-btn weui-btn_primary">用户管理</a>
</div>

<div class="weui-btn-area">
    <a href="#" class="weui-btn weui-btn_primary">房间管理</a>
</div>

<div class="weui-btn-area">
    <a href="{{ action('Home\AdminController@post') }}" class="weui-btn weui-btn_primary">帖子管理</a>
</div>

<div class="weui-btn-area">
    <a href="#" class="weui-btn weui-btn_primary">系统管理</a>
</div>

</body>

<script src="{{asset('/resources/js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/weui/dist/weui.min.js')}}"></script>

</html>