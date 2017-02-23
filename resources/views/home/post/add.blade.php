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
<form action="{{action('Home\PostController@store')}}" method="post" id="form">
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

        <!-- 选择 -->
        <div class="weui-cells">
            <!-- 带标题 -->
            <div class="weui-cell weui-cell_select weui-cell_select-after">
                <div class="weui-cell__hd">
                    <label for="" class="weui-label">版块</label>
                </div>
                <div class="weui-cell__bd">
                    <select class="weui-select" name="section_id">
                        @foreach ($section as $value)
                            <option value="{{$value->id}}" {{ isset($value->status) ? 'selected' : '' }}>{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- 图片上传 -->
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        <div class="weui-uploader__hd">
                            <!-- 标题 -->
                            <p class="weui-uploader__title">图片上传</p>
                            <!-- 计数器样式 -->
                            <div class="weui-uploader__info">0/2</div>
                        </div>
                        <div class="weui-uploader__bd">
                            <ul class="weui-uploader__files">
                                <!-- 上传成功后的样式 -->
                                <li class="weui-uploader__file" style="background-image:url(./images/pic_160.png)"></li>
                                <!-- 上传失败后的样式 -->
                                <li class="weui-uploader__file weui-uploader__file_status"
                                    style="background-image:url(./images/pic_160.png)">
                                    <div class="weui-uploader__file-content">
                                        <i class="weui-icon-warn"></i>
                                    </div>
                                </li>
                                <!-- 正在上传的样式 -->
                                <li class="weui-uploader__file weui-uploader__file_status"
                                    style="background-image:url(./images/pic_160.png)">
                                    <div class="weui-uploader__file-content">50%</div>
                                </li>
                            </ul>
                            <!-- 添加图片按钮（加号） -->
                            <div class="weui-uploader__input-box">
                                <input class="weui-uploader__input" type="file" accept="image/*" multiple="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea" name="content" placeholder="请输入帖子内容" rows="8" required emptyTips="帖子内容不能为空"
                              notMatchTips="帖子内容不能为空"></textarea>
                    {{--<div class="weui-textarea-counter"><span>0</span>/200</div>--}}
                </div>
            </div>
        </div>

        <!-- 按钮两侧留有空隙 -->
        <div class="weui-btn-area">
            <a href="#" class="weui-btn weui-btn_primary" onclick="validationForm()">发帖</a>
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