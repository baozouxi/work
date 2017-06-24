
    <!--导航-->
    <div class="guide">
        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
            <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');" url="sms.asp">短信记录</a><span class="ider">&gt;</span></li>
            <li><span id="guide">列表</span></li>
        </ul>
        <p class="nlink right"><a href="javascript:void(0);" title="新增短信" onclick="msgbox(this,600);" url="{{ route('sms.create') }}" class="sms"><span class="icon">ė</span>新增短信</a></p>
    </div>
    <div id="wrap" class="wrap">
        <!--整体内容-->
        <div id="container" class="container">
            <div class="top">
                <h3 class="left"><span class="icon">ė</span>短信列表</h3>
                <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
            </div>
            <div class="fun none" id="fun" style="display: none;">
                <div id="fun-n" class="right">
                    <select class="select" onchange="To('sms.asp?s=1&amp;n='+this.options[this.selectedIndex].value+'','main');">
                        <option value="0" selected="selected">所有用户</option>
                        <option value="1">医患通</option>
                        <option value="2">咨询</option>
                        <option value="3">导医</option>
                        <option value="4">一株</option>
                        <option value="5">yisheng</option>
                        <option value="6">竞价</option>
                        <option value="7">测试修改</option>
                    </select>
                </div>
            </div>
            <div id="box" class="box">
                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="120">
                                <center>时 间</center>
                            </th>
                            <th width="120">
                                <center>手 机</center>
                            </th>
                            <th width="*">短信内容</th>
                            <th width="70">
                                <center>发送状态</center>
                            </th>
                            <th width="80">
                                <center>操 作</center>
                            </th>
                            <th width="30">
                                <center>删</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td colspan="6">
                                <center>暂无数据</center>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="this_url" id="this_url" value="/sms.asp">
            </div>
        </div>
    </div>
