<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');" url="call.asp">回拨记录</a><span class="ider">&gt;</span></li>
        <li><span id="guide">列表</span></li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="fastL('call.asp?act=com');" class="sms"><span class="icon">ƀ</span>更新状态</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ĕ</span>回拨列表</h3>
            <p class="nlink right"></p>
        </div>
        <div class="fun none" id="fun">
            <div id="fun-n" class="right"></div>
        </div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="120">
                            <center><a href="javascript:void(0);" url="call.asp?t=dateline&amp;go=desc" title="按时间排序" onclick="fastH(this)">时间</a></center>
                        </th>
                        <th width="*"><a href="javascript:void(0);" url="call.asp?t=name&amp;go=desc" title="按姓名排序" onclick="fastH(this)">姓名</a></th>
                        <th width="120">
                            <center><a href="javascript:void(0);" url="call.asp?t=phone&amp;go=desc" title="按手机排序" onclick="fastH(this)">手机</a></center>
                        </th>
                        <th width="70">
                            <center><a href="javascript:void(0);" url="call.asp?t=state&amp;go=desc" title="按状态排序" onclick="fastH(this)">状态</a></center>
                        </th>
                        <th width="130">
                            <center>标识</center>
                        </th>
                        <th width="120">
                            <center><a href="javascript:void(0);" url="call.asp?t=ip&amp;go=desc" title="按IP地址排序" onclick="fastH(this)">IP地址</a></center>
                        </th>
                        <th width="100">
                            <center><a href="javascript:void(0);" url="call.asp?t=postdate&amp;go=desc" title="按处理时间排序" onclick="fastH(this)">处理时间</a></center>
                        </th>
                        <th width="100">
                            <center><a href="javascript:void(0);" url="call.asp?t=uid&amp;go=desc" title="按操作排序" onclick="fastH(this)">操作</a></center>
                        </th>
                        <th width="30">
                            <center>删</center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                    <tr class="t1">
                        <td colspan="9">
                            <center>暂无数据</center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/call.asp">
        </div>
    </div>
</div>
