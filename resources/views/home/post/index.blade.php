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
<!-- 文章 -->
<article class="weui-article">
    <h1>{{$data->title}}</h1>
    <section>
        <div>
            <img style="width: 6ex" src="{{session('wechat.oauth_user')->avatar}}" alt="出错了">
            &nbsp;{{$user['name']}}&nbsp;<span style="color:#51C332"">({{$user['build']}})</span>
        </div>
    </section>
    <section>
        <p>{{$data->content}}</p>
    </section>
</article>

</body>

<script src="{{asset('/resources/js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/weui/dist/weui.min.js')}}"></script>

<script>

</script>

</html>