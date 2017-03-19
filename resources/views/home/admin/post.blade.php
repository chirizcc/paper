<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/1.1.1/weui.min.css">
    <link rel="{{asset('/resources/css/public.css')}}">
    <title>帖子管理</title>
</head>
<body ontouchstart>
<!-- 带说明的列表 -->
<div class="weui-cells">
    @foreach ($posts as $item)
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <p><a href="{{ action('Home\PostController@index', ['id' => $item->id])  }}">{{ substr($item->title, 0, 6) }} - {{ $item->user_name }}</a></p>
            </div>
            <div class="weui-cell__ft">
                <!-- mini 按钮 -->
                <a href="{{ action('Home\AdminController@delPost', ['id' => $item->id])  }}" class="weui-btn weui-btn_mini weui-btn_primary">删除</a>
            </div>
        </div>
    @endforeach
</div>
</body>

<script src="{{asset('/resources/js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/weui/dist/weui.min.js')}}"></script>

</html>