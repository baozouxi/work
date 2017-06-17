<!DOCTYPE html>
<!-- saved from url=(0029)http://test.ehis.cc/index.asp -->
<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0">
    <title>成都锦一医院-后台管理</title>
    <meta name="keywords" content="网络预约系统,医院管理系统,咨询预约系统,咨询预约系统,医患通">
    <meta name="description" content="医患通（EHIS），基于BS构架开发的适用于专科、门诊、医院、集团的HIS系统。">
    <link rel="apple-touch-icon-precomposed" href="http://cdn.ehis.cc/2.3/icon72x72@2x.png">
    <link type="text/css" href="{{ asset('css') }}/style.css" rel="stylesheet">
    <script src="{{ asset('js') }}/fun.js" type="text/javascript"></script>
    <link href="{{ asset('css') }}/tiny.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('js') }}/ajax.js"></script>
    <script src="{{ asset('js') }}/geo.js"></script>
    <script src="{{ asset('js') }}/sys.js"></script>
    <script src="{{ asset('js') }}/WdatePicker.js"></script>
    <script src="{{ asset('js') }}/tiny.js"></script>
    <link href="{{ asset('css') }}/WdatePicker.css" rel="stylesheet" type="text/css">
</head>

<body youdao="bind">
    <style>
    body {
        background-color: #00A2CA;
    }
    
    a {
        color: #fff;
        font: bold 12px/1.5 'Verdana'
    }
    </style>
    <div class="login">
        <h1>成都锦一医院</h1>
        <div class="login-box" id="login-box">
            <form id="form_sub" name="form_sub" method="post" action="javascript:login();">
                <label class="inline">用户</label>
                <input type="text" name="nick" id="nick" class="input" value="" style="width:230px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor=&#39;#fff&#39;;" onfocus="this.style.backgroundColor=&#39;#FFFEF1&#39;;this.style.backgroundImage=&#39;none&#39;;">
                <label class="inline">密码</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="password" name="password" id="password" class="input" value="" style="width:230px;" autocomplete="off" onblur="this.style.backgroundColor=&#39;#fff&#39;;" onfocus="this.style.backgroundColor=&#39;#FFFEF1&#39;;">
                <div id="code" style="display: none;">
                    <label class="inline">验证码</label>
                    <input type="text" name="keycode" id="keycode" class="input" value="" style="width:150px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor=&#39;#fff&#39;;" onfocus="this.style.backgroundColor=&#39;#FFFEF1&#39;;">
                    <button type="button" onclick="Getcode(&#39;index.asp&#39;,&#39;nick&#39;);" class="button">重发</button>
                </div>
                <input type="hidden" name="up" id="up" value="login">
                <label class="inline"></label>
                <button type="submit" id="submit" class="submit"><span class="icon">Ķ</span>登陆</button>
            </form>
        </div>
    </div>
    <center>
        <br>
        <br>
        <a href="http://www.ehis.cc/" target="_blank" style="height:20px;display:block;" title="医患通2.1新春版"><img src="{{ asset('img') }}/icon.png" style="margin-bottom:-3px;border: 0;">HIS</a>
    </center>
    <script>
    if (exist('call_dbbak')) {
        window.setTimeout("dbbak()", 100);
    }
    </script>
    <div id="call_dbbak"></div>
</body>

</html>
