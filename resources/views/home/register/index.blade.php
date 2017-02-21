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
<form action="{{action('Home\RegisterController@register')}}" method="post" id="form">
    <input type="hidden" value="{{csrf_token()}}" name="_token">
    <div class="weui-cells__title">请填写您的居住信息</div>
    <!-- 带按钮的输入框 -->
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd">
                <label class="weui-label">楼号</label>
            </div>
            <div class="weui-cell__ft">
                <a href="javascript:void (0)" class="weui-vcode-btn" onclick="cloose()" id="buildBtn">选择楼号</a>
            </div>
        </div>
    </div>

    <!-- 带按钮的输入框 -->
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd">
                <label class="weui-label">楼层</label>
            </div>
            <div class="weui-cell__ft">
                <a href="javascript:void (0)" class="weui-vcode-btn" onclick="cloose()" id="floorBtn">选择楼层</a>
            </div>
        </div>
    </div>

    <!-- 带按钮的输入框 -->
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd">
                <label class="weui-label">房间号</label>
            </div>
            <div class="weui-cell__ft">
                <a href="javascript:void (0)" class="weui-vcode-btn" onclick="cloose()" id="roomBtn">选择房间号</a>
                <input type="hidden" name="room" id="room" required pattern="[0-9]{1,2}" emptyTips="请选择居住房间"
                       notMatchTips="请选择正确的居住房间">
            </div>
        </div>
    </div>

    <!-- 带按钮的输入框 -->
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell weui-cell_vcode">
            <div class="weui-cell__hd">
                <label class="weui-label">姓名</label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" id="name" name="name" type="text" placeholder="请输入您的姓名" required
                       emptyTips="请输入您的姓名" notMatchTips="请选择正确的居住房间">
            </div>
        </div>
    </div>

    <!-- 按钮两侧留有空隙 -->
    <div class="weui-btn-area">
        <!-- 绿色按钮 -->
        <a href="javascript:void (0)" id="formSubmitBtn" class="weui-btn weui-btn_primary"
           onclick="validationForm()">提交</a>
    </div>

</form>
</body>

<script src="{{asset('/resources/js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/resources/weui/dist/weui.min.js')}}"></script>

<script>
    // 级联picker的默认选择项
    defaultValue = getMin();

    // 点击选择是，弹出级联picker
    function cloose() {
        var build = {!! $build !!};
        // 级联picker
        weui.picker(build, {
            className: 'custom-classname',
            defaultValue: defaultValue,
            onConfirm: function (result) {
//                console.log(result)
                $('#buildBtn').html(result[0]['label']);
                $('#floorBtn').html(result[1]['label']);
                $('#roomBtn').html(result[2]['label']);
                $('#room').val(result[2]['value']);
                defaultValue = [result[0]['value'], result[1]['value'], result[2]['value']];
            },
            id: 'doubleLinePicker'
        });
    }

    // 获取最小的选择项，作为第一次点击的默认现在项
    function getMin() {
        var build = {!! $build !!};

        var minBuild = build[0]['value'];
        var minBuildKey = 0;
        $.each(build, function (i, n) {
            if (n['value'] < minBuild) {
                minBuild = n['value'];
                minBuildKey = i;
            }
        });

        var minFloor = build[minBuildKey]['children'][0]['value'];
        var minFloorKey = 0;
        $.each(build[minBuildKey]['children'], function (i, n) {
            if (n['value'] < minFloor) {
                minFloor = n['value'];
                minFloorKey = i;
            }
        });

        var minRoom = build[minBuildKey]['children'][minFloorKey]['children'][0]['label'];
        var minRoomKey = build[minBuildKey]['children'][minFloorKey]['children'][0]['value'];
        $.each(build[minBuildKey]['children'][minFloorKey]['children'], function (i, n) {
            if (n['label'] < minRoom) {
                minRoom = n['label'];
                minRoomKey = n['value'];
            }
        });

        return [minBuild, minFloor, minRoomKey];
    }

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