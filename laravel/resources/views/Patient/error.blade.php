
    <!--导航-->
    <div class="guide">
        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
            <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="turn.asp?s=1&amp;m=turn">患者列表</a><span class="ider">&gt;</span></li>
            <li>新增患者</li>
        </ul>
    </div>
    <div id="wrap" class="wrap">
        <!--整体内容-->
        <div id="container" class="container">
            <div class="top">
                <h3 class="left"><span class="icon">ŷ</span>新增患者</h3>
                <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="turn.asp?s=1&amp;m=turn" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
            </div>
            <div id="box" class="box">
                {{ $error }}
            </div>
        </div>
    </div>

