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
<div style="text-align: center;padding: 5px;color:#51C332">
    <h1>完善资料</h1>
</div>
<form action="{{action('Home\RegisterController@register')}}" method="post">
    <div class="weui-cells__title">请填写您的居住信息</div>
    <!-- 带标题 -->
    <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
            <label for="" class="weui-label">楼号</label>
        </div>
        <div class="weui-cell__bd">
            <select class="weui-select" name="build" id="build">
                @foreach ($build as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- 带标题 -->
    <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
            <label for="" class="weui-label">楼层</label>
        </div>
        <div class="weui-cell__bd">
            <select class="weui-select" name="floor" id="floor">
                <option>请选择</option>
            </select>
        </div>
    </div>

    <!-- 带标题 -->
    <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
            <label for="" class="weui-label">房间号</label>
        </div>
        <div class="weui-cell__bd">
            <select class="weui-select" name="room" id="room">
                <option>请选择</option>
            </select>
        </div>
    </div>

    <!-- 输入框 -->
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="name" type="text" placeholder="请输入您的姓名">
        </div>
    </div>

    <!-- 按钮两侧留有空隙 -->
    <div class="weui-btn-area">
        <!-- 绿色按钮 -->
        <button type="submit" href="#" class="weui-btn weui-btn_primary">提交</button>
    </div>

</form>

</body>

<script src="{{asset('/resources/js/jquery-3.1.1.min.js')}}"></script>

<script>

    $('#build').change(function () {
        getFloor($(this).val());
    });

    $('#floor').change(function () {
        getRoom($(this).val());
    });

    // ajax获取该楼的楼层
    function getFloor(build) {
        $.get('{{action('Home\RegisterController@getFloor')}}', {'build': build}, function (data) {
            console.log(data.length);
            $('#floor').empty();
            if (data.length < 1) {
                $('#floor').append('<option>该楼无楼层</option>');
            } else {
                $.each(data, function (key, value) {
                    $('#floor').append('<option value="' + value + '">' + value + '</option>');
                });
            }
        });
    }

    // ajax获取该楼层房间
    function getRoom(floor) {
        $.get('{{action('Home\RegisterController@getRoom')}}', {'floor': floor}, function (data) {
            console.log(data.length);
            $('#room').empty();
            if (data.length < 1) {
                $('#room').append('<option>该层无房间</option>');
            } else {
                $.each(data, function (key, value) {
                    $('#room').append('<option value="' + value + '">' + value + '</option>');
                });
            }
        });
    }
</script>

</html>