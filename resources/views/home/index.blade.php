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
    <style>
        .banner {
            position: relative;
            overflow: auto;
        }

        .banner li {
            list-style: none;
        }

        .banner ul li {
            float: left;
        }
    </style>
</head>
<body ontouchstart>

<div class="banner">
    <ul>
        <li><img src="{{asset('/resources/image/image1.jpg')}}" alt=""></li>
        <li><img src="{{asset('/resources/image/image2.jpg')}}" alt=""></li>
        <li><img src="{{asset('/resources/image/image3.jpg')}}" alt=""></li>
    </ul>
</div>

<!-- 九宫格 -->
<div class="weui-grids">

    @foreach ($section as $value)
        <a href="{{action('Home\SectionController@index', ['id' => $value->id])}}" class="weui-grid">
            <!-- 图标 -->
            <div class="weui-grid__icon">
                <img src="@if (!empty($value->icon)) {{$value->icon}} @else{{asset('/resources/image/image1.jpg')}}@endif"
                     alt="">
            </div>
            <!-- 标签文字 -->
            <p class="weui-grid__label">{{ $value->name  }}</p>
        </a>
    @endforeach

</div>

<div class="weui-tab">
    <div class="weui-tab__panel">

    </div>
    <div class="weui-tabbar">
        <a href="javascript:;" class="weui-tabbar__item weui-bar__item_on">
            <img src="{{asset('/resources/image/icon_nav_button.png')}}" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">我的</p>
        </a>
        <a href="javascript:;" class="weui-tabbar__item">
            <img src="{{asset('/resources/image/icon_nav_cell.png')}}" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">管理</p>
        </a>
    </div>
</div>

</body>

<script src="{{asset('/resources/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('/resources/js/unslider.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/weui/dist/weui.min.js')}}"></script>

<script>
    $(function () {
        $('.banner').unslider({
            dots: true,
            fluid: true
        });
    });
</script>

</html>