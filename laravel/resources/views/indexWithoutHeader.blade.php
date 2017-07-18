<!DOCTYPE html>
<!-- saved from url=(0028)http://test.ehis.cc/main.asp -->
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

</head>

<body>
    <!--头部-->

    <!--左边-->

    <!--右边-->

        <!--导航-->
        <div class="guide">
            <ul class="left">
                <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="fastH(this,&#39;main&#39;)" url="{{ route('index',['s'=>'1']) }}">首页</a></li>
            </ul>
        </div>
        <div id="wrap" class="wrap">
            <!--整体内容-->
            <div id="container" class="container">
                <div class="top">
                    <h3 class="left"><span class="icon">Ă</span>首页</h3>
                    <p class="nlink right"><a href="javascript:void(0);" onclick="msgbox(this);" title="任务设置" url="main.asp?act=think"><span class="icon">Ň</span>设置</a></p>
                </div>
                <div id="box" class="box">
                    <div class="user_main">
                        <div class="user_take right">
                            <p></p>
                            <center>—— 竞价成本 ——</center>
                            <p></p>
                            <p>竞价消费：5000 元</p>
                            <p></p>
                            <p>预约成本：1250 元</p>
                            <p></p>
                            <p>到诊成本：2500 元</p>
                            <p></p>
                        </div>
                        <div class="user_all right">
                            <p></p>
                            <center>—— 全体业绩 ——</center>
                            <p></p>
                            <p>预约：4 人</p>
                            <p></p>
                            <p>到诊：2 人</p>
                            <p></p>
                            <p>转换：50.0%</p>
                        </div>
                        <div class="user_info">
                            <div class="user_face left"><img src="{{ asset('img') }}/qq1102885555.jpg" title="超级管理员"></div>
                            <p>你好，医患通</p>
                            <p></p>
                            <p id="this_main">用户权限：超级管理员</p>
                            <p>登录次数：<em>416</em>次，上次于<em>04-28 12:54</em>在<a href="javascript:void(0);" onclick="local(&#39;182.148.16.223&#39;);" title="电脑端:182.148.16.223"><em id="call_local">四川省成都市双流区电信</em></a>登陆成功</p>
                            <p>
                                <script>
                                local('182.148.16.223');
                                </script>
                            </p>
                            <p>实时数据：本月预约<em>4</em>,上月<em>0</em>,环比增长<i>100%</i>;本月到诊<em>2</em>,上月<em>0</em>,环比增长<i>100%</i>;</p>
                            <p></p>
                        </div>
                    </div>
                    <div class="top_main" style="overflow:hidden;">
                        <div class="left" style="width:33.3%;">
                            <div class="top_title">
                                <h3><span class="icon">İ</span>对话排行</h3></div>
                            <ul></ul>
                        </div>
                        <div class="left" style="width:33.3%;">
                            <div class="top_title">
                                <h3><span class="icon">Ĵ</span>预约排行</h3></div>
                            <ul>
                                <li class="clearfix">
                                    <div class="top_face left"><span class="t1">1</span></div>
                                    <div class="top_info">
                                        <p><span class="right">2</span><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;o=uid&amp;aid=3&amp;to=m"><u>电话</u></a></p>
                                        <p></p>
                                        <div class="top_progress">
                                            <div class="top_progress-bar"><span class="top_sr-only" style="width:50.0%"></span></div>
                                        </div>
                                        <p></p>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="top_face left"><span class="t2">2</span></div>
                                    <div class="top_info">
                                        <p><span class="right">2</span><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;o=uid&amp;aid=2&amp;to=m"><u>啊啊啊</u></a></p>
                                        <p></p>
                                        <div class="top_progress">
                                            <div class="top_progress-bar"><span class="top_sr-only" style="width:50.0%"></span></div>
                                        </div>
                                        <p></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="right" style="width:33.3%;">
                            <div class="top_title" style="margin-right:0;">
                                <h3><span class="icon">Ķ</span>到诊排行</h3></div>
                            <ul style="margin-right:0;">
                                <li class="clearfix">
                                    <div class="top_face left"><span class="t1">1</span></div>
                                    <div class="top_info">
                                        <p><span class="right">2</span><a href="javascript:void(0);" onclick="msgbox(this,800);" url="turn.asp?m=stat&amp;o=uid&amp;aid=2&amp;to=m"><u>啊啊啊</u></a></p>
                                        <p></p>
                                        <div class="top_progress">
                                            <div class="top_progress-bar"><span class="top_sr-only" style="width:100.0%"></span></div>
                                        </div>
                                        <p></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="top_main" style="margin:0;overflow:hidden;">
                        <div class="left" style="width:33.3%;">
                            <div class="top_title">
                                <h3><span class="icon">Ĵ</span>预约今日</h3></div>
                            <div class="list">
                                <table cellspacing="1" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th width="60">
                                                <center>预约</center>
                                            </th>
                                            <th width="*">姓名</th>
                                            <th width="120">
                                                <center>病种</center>
                                            </th>
                                            <th width="80">
                                                <center>时间</center>
                                            </th>
                                            <th width="80">
                                                <center>录入</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablebg">
                                        <tr class="t1">
                                            <td colspan="5">
                                                <center>无记录</center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="left" style="width:33.3%;">
                            <div class="top_title">
                                <h3><span class="icon">Ĵ</span>今日预约</h3></div>
                            <div class="list">
                                <table cellspacing="1" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th width="60">
                                                <center>时间</center>
                                            </th>
                                            <th width="*">姓名</th>
                                            <th width="120">
                                                <center>途径</center>
                                            </th>
                                            <th width="80">
                                                <center>预约</center>
                                            </th>
                                            <th width="80">
                                                <center>录入</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablebg">
                                        <tr class="t1">
                                            <td colspan="5">
                                                <center>无记录</center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="right" style="width:33.3%;">
                            <div class="top_title" style="margin-right:0;">
                                <h3><span class="icon">Ķ</span>今日到诊</h3></div>
                            <div class="list" style="margin-right:0;">
                                <table cellspacing="1" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th width="60">
                                                <center>时间</center>
                                            </th>
                                            <th width="*">姓名</th>
                                            <th width="120">
                                                <center>病种</center>
                                            </th>
                                            <th width="80">
                                                <center>医生</center>
                                            </th>
                                            <th width="80">
                                                <center>录入</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablebg">
                                        <tr class="t1">
                                            <td colspan="5">
                                                <center>无记录</center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="this_url" id="this_url" value="/main.asp">
                </div>
            </div>
        </div>

    <!--底部-->
    <div id="footer" class="footer">
        <div class="tips right"></div>
        <div class="copy"><a href="javascript:void(0);" onclick="weather();" title="刷新"><span class="icon" style="color:#777;">ę</span></a> <span id="call_weather">天气加载中...</div>
    </div>
    <script>
    window.setTimeout("now_tip()", 100);
    if (exist('call_local')) {
        window.setTimeout("$('call_local').click()", 150);
    }
    if (exist('call_weather')) {
        window.setTimeout("weather()", 200);
    }
    if (exist('call_track')) {
        window.setTimeout("track()", 250);
    }
    if (exist('this_user')) {
        To('user.asp?act=pass');
    }
    </script>
    <script>
    if (exist('call_dbbak')) {
        window.setTimeout("dbbak()", 100);
    }
    </script>
</body>

</html>
