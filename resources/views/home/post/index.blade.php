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
            &nbsp;{{$user['name']}}&nbsp;<span style="color:#51C332">{{$user['str']}}</span>
        </div>
    </section>
    <section>
        <p>{{$data->content}}</p>
    </section>
</article>

<!-- 文字组合列表 -->
<div class="weui-panel weui-panel_access">
    <!-- head 部分 -->
    <div class="weui-panel__hd">评论</div>
    <!-- body 部分 -->
    <div class="weui-panel__bd">

        @foreach ($comment as $item)
            <div href="#" class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title">{{ $item['name'] }} <span style="color:#51C332">{{ $item['str'] }}</span></h4>
                <p class="weui-media-box__desc">{{ $item['content'] }}</p>
            </div>
        @endforeach
    </div>


</div>

<div style="position: fixed;bottom: 0;">
    <form action="{{ action('Home\PostController@comment') }}" method="post" id="form">
        <!-- 带按钮的输入框 -->
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell weui-cell_vcode">
                <div class="weui-cell__bd">
                    {{ csrf_field() }}
                    <input class="weui-input" type="text" placeholder="评论" name="content">
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
                <div class="weui-cell__ft" style="float: right">
                    <!-- mini 按钮 -->
                    {{--<a href="" class="weui-btn weui-btn_mini weui-btn_primary" onclick="validationForm()">评论</a>--}}
                    <button type="submit" class="weui-btn weui-btn_mini weui-btn_primary">评论</button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>

<script src="{{asset('/resources/js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/weui/dist/weui.min.js')}}"></script>

<script>
    function validationForm() {
        // weui.form.validate('#form', function(error){ console.log(error);}); // error: {dom:[Object], msg:[String]}
        weui.form.validate('#form', function (error) {
            if (!error) {
                // 当没有错误时提交表单
                document.getElementById("form").submit();
            }
            // return true; // 当return true时，不会显示错误
        });
    }
</script>

</html>