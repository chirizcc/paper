<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/1.1.1/weui.min.css">
    <link rel="{{asset('/resources/css/public.css')}}">
    <title>发帖</title>
</head>
<body ontouchstart>
<form action="{{action('Home\ActivityController@store')}}" method="post" id="form">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="user_id" value="{{$user_id}}">
    <!-- 输入框 -->
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">标题</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="title" type="text" placeholder="请输入标题" required emptyTips="请输入标题"
                       notMatchTips="请正确的输入标题">
            </div>
        </div>


        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">最大参与人数</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" name="people" type="number" placeholder="请输入最大参与人数" required
                       emptyTips="最大参与人数"
                       notMatchTips="请正确的最大参与人数">
            </div>
        </div>

        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea" name="content" placeholder="请输入活动内容" rows="8" required
                              emptyTips="活动内容不能为空"
                              notMatchTips="活动内容不能为空"></textarea>
                </div>
            </div>
        </div>

        <!-- 按钮两侧留有空隙 -->
        <div class="weui-btn-area">
            <a href="#" class="weui-btn weui-btn_primary" onclick="validationForm()">发起活动</a>
        </div>

    </div>
</form>
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