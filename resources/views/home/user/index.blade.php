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

<!-- 带说明的列表 -->
<div class="weui-cells">
    <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>用户名</p>
        </div>
        <div class="weui-cell__ft">{{$user->name}}</div>
    </div>
</div>

<div class="weui-cells">
    <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>姓名</p>
        </div>
        <div class="weui-cell__ft">{{$user->trueName}}</div>
    </div>
</div>

<div class="weui-cells">
    <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>房间</p>
        </div>
        <div class="weui-cell__ft">{{$user->room}}</div>
    </div>
</div>

<!-- 开关 -->
<div class="weui-cells weui-cells_form">
    <div class="weui-cell weui-cell_switch">
        <div class="weui-cell__bd">房间对外可见</div>
        <div class="weui-cell__ft">
            <input class="weui-switch" type="checkbox" @if($user->room_look == 1) checked @endif onclick="changLook('room', {{ $user->room_look }})">
        </div>
    </div>
</div>

<!-- 开关 -->
<div class="weui-cells weui-cells_form">
    <div class="weui-cell weui-cell_switch">
        <div class="weui-cell__bd">姓名对外可见</div>
        <div class="weui-cell__ft">
            <input class="weui-switch" type="checkbox" @if($user->name_look == 1) checked @endif onclick="changLook('name', {{ $user->name_look }})">
        </div>
    </div>
</div>

</body>

<script src="{{asset('/resources/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('/resources/js/unslider.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/weui/dist/weui.min.js')}}"></script>

<script>
    function changLook(type, value) {
        if (type == 'room') {
            $.post('{{ action('Home\IndexController@changRoomLook') }}', {'id':'{{ $user->id }}','value' : value,'_token':'{{ csrf_token() }}'});
        } else if(type == 'name') {
            $.post('{{ action('Home\IndexController@changNameLook') }}', {'id':'{{ $user->id }}','value' : value,'_token':'{{ csrf_token() }}'});
        }
    }
</script>

</html>