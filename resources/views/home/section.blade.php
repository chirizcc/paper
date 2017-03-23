<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/1.1.1/weui.min.css">
    <link rel="{{asset('/resources/css/public.css')}}">
    <title>{{ $section->name }}</title>
</head>
<body ontouchstart>

<!-- 按钮两侧留有空隙 -->
<div class="weui-btn-area">
    <a href="{{action('Home\PostController@create', ['section' => $section->id])}}"
       class="weui-btn weui-btn_primary">发帖</a>
</div>

<!-- 图文组合列表 -->
<div class="weui-panel weui-panel_access">
{{--<!-- head 部分 -->
<div class="weui-panel__hd">图文组合列表</div>--}}
<!-- body 部分 -->
    <div class="weui-panel__bd">
        @if (!empty($data))
            @foreach ($data as $item)
                <a href="{{ action('Home\PostController@index', ['id' => $item->id])  }}"
                   class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img src="{{asset('/resources/image/default.jpg')}}" alt="" class="weui-media-box__thumb">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">{{ $item->title  }}</h4>
                        <p class="weui-media-box__desc">{{  $item->content  }}</p>
                    </div>
                </a>

            @endforeach
        @endif

    </div>
    <!-- foot 部分 -->
    <div class="weui-panel__ft">
        <a href="#" class="weui-cell weui-cell_access weui-cell_link">
            <div class="weui-cell__bd">查看更多</div>
            <span class="weui-cell__ft"></span>
        </a>
    </div>
</div>

</body>

<script src="{{asset('/resources/js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/weui/dist/weui.min.js')}}"></script>

</html>