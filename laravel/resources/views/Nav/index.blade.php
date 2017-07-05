<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>导航管理</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ĉ</span>导航列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('nav.create') }}"><span class="icon">ŷ</span>新增导航</a></h3></div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="50">
                            <center>编号</center>
                        </th>
                        <th width="*">名称</th>
                        <th width="60">
                            <center>状态</center>
                        </th>
                        <th width="60">
                            <center>短信</center>
                        </th>
                        <th width="60">
                            <center>排序</center>
                        </th>
                        <th width="60">
                            <center>合并</center>
                        </th>
                        <th width="40">
                            <center>删</center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                    <tr class="t1">
                        <td>
                            <center>1</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑大类" onclick="msgbox(this);" url="http://c.com/disease/1/edit">asdas</a></td>
                        <td>
                            <center><span id="state1" style="cursor:pointer;" onclick="fast('','state1');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=7"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('dis.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=7">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>2</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="http://c.com/disease/2/edit">sadaszzz</a></td>
                        <td>
                            <center><span id="state2" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=8','state2');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=8"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank8" style="cursor:pointer;" onclick="fastE('dis.asp','rank',8)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=8">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=8"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>3</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑大类" onclick="msgbox(this);" url="http://c.com/disease/3/edit">撒哒自行车</a></td>
                        <td>
                            <center><span id="state3" style="cursor:pointer;" onclick="fast('','state3');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=7"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('dis.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=7">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>4</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑大类" onclick="msgbox(this);" url="http://c.com/disease/4/edit">撒大师的啊</a></td>
                        <td>
                            <center><span id="state4" style="cursor:pointer;" onclick="fast('','state4');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=7"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('dis.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=7">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>5</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑大类" onclick="msgbox(this);" url="http://c.com/disease/5/edit">啊实打实</a></td>
                        <td>
                            <center><span id="state5" style="cursor:pointer;" onclick="fast('','state5');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=7"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('dis.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=7">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>6</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑大类" onclick="msgbox(this);" url="http://c.com/disease/6/edit">zxa</a></td>
                        <td>
                            <center><span id="state6" style="cursor:pointer;" onclick="fast('','state6');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=7"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('dis.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=7">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>7</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑大类" onclick="msgbox(this);" url="http://c.com/disease/7/edit">撒大师</a></td>
                        <td>
                            <center><span id="state7" style="cursor:pointer;" onclick="fast('','state7');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=7"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('dis.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=7">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="http://c.com/disease">
        </div>
    </div>
</div>
