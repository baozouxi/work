<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>病种管理</li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="msgbox(this,550);" url="dis.asp?act=tpl" class="sms"><span class="icon">ė</span>短信模版</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ĉ</span>病种列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('disease.create') }}"><span class="icon">ŷ</span>新增病种</a></h3></div>
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
                            <center>7</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑大类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=7">肾病</a> [<a href="javascript:void(0);" title="新增小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;cid=7">+</a>]</td>
                        <td>
                            <center><span id="state7" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=7','state7');">正常</span></center>
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
                            <center>8</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=8">肾病综合征</a></td>
                        <td>
                            <center><span id="state8" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=8','state8');">正常</span></center>
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
                            <center>9</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=9">肌酐</a></td>
                        <td>
                            <center><span id="state9" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=9','state9');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=9"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank9" style="cursor:pointer;" onclick="fastE('dis.asp','rank',9)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=9">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=9"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>11</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=11">慢性肾炎</a></td>
                        <td>
                            <center><span id="state11" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=11','state11');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=11"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank11" style="cursor:pointer;" onclick="fastE('dis.asp','rank',11)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=11">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=11"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>13</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=13">急性肾炎</a></td>
                        <td>
                            <center><span id="state13" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=13','state13');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=13"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank13" style="cursor:pointer;" onclick="fastE('dis.asp','rank',13)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=13">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=13"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>14</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=14">IgA肾病</a></td>
                        <td>
                            <center><span id="state14" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=14','state14');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=14"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank14" style="cursor:pointer;" onclick="fastE('dis.asp','rank',14)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=14">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=14"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>15</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=15">紫癜性肾炎</a></td>
                        <td>
                            <center><span id="state15" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=15','state15');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=15"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank15" style="cursor:pointer;" onclick="fastE('dis.asp','rank',15)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=15">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=15"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>16</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=16">狼疮性肾炎</a></td>
                        <td>
                            <center><span id="state16" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=16','state16');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=16"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank16" style="cursor:pointer;" onclick="fastE('dis.asp','rank',16)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=16">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=16"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>17</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=17">肾囊肿</a></td>
                        <td>
                            <center><span id="state17" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=17','state17');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=17"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank17" style="cursor:pointer;" onclick="fastE('dis.asp','rank',17)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=17">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=17"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>18</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=18">多囊肾</a></td>
                        <td>
                            <center><span id="state18" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=18','state18');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=18"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank18" style="cursor:pointer;" onclick="fastE('dis.asp','rank',18)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=18">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=18"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>19</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=19">肾检</a></td>
                        <td>
                            <center><span id="state19" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=19','state19');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=19"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank19" style="cursor:pointer;" onclick="fastE('dis.asp','rank',19)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=19">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=19"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>20</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=20">糖尿病肾病</a></td>
                        <td>
                            <center><span id="state20" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=20','state20');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=20"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank20" style="cursor:pointer;" onclick="fastE('dis.asp','rank',20)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=20">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=20"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>21</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=21">高血压肾病</a></td>
                        <td>
                            <center><span id="state21" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=21','state21');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=21"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank21" style="cursor:pointer;" onclick="fastE('dis.asp','rank',21)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=21">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=21"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>22</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=22">肾盂肾炎</a></td>
                        <td>
                            <center><span id="state22" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=22','state22');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=22"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank22" style="cursor:pointer;" onclick="fastE('dis.asp','rank',22)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=22">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=22"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>23</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=23">肾结石/肾积水</a></td>
                        <td>
                            <center><span id="state23" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=23','state23');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=23"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank23" style="cursor:pointer;" onclick="fastE('dis.asp','rank',23)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=23">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=23"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>24</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=24">肾萎缩</a></td>
                        <td>
                            <center><span id="state24" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=24','state24');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=24"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank24" style="cursor:pointer;" onclick="fastE('dis.asp','rank',24)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=24">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=24"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>25</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=25">尿蛋白/潜血</a></td>
                        <td>
                            <center><span id="state25" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=25','state25');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=25"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank25" style="cursor:pointer;" onclick="fastE('dis.asp','rank',25)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=25">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=25"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>26</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=26">肾功能不全</a></td>
                        <td>
                            <center><span id="state26" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=26','state26');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=26"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank26" style="cursor:pointer;" onclick="fastE('dis.asp','rank',26)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=26">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=26"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>27</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=27">肾衰竭</a></td>
                        <td>
                            <center><span id="state27" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=27','state27');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=27"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank27" style="cursor:pointer;" onclick="fastE('dis.asp','rank',27)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=27">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=27"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>28</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=28">尿毒症-已透析</a></td>
                        <td>
                            <center><span id="state28" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=28','state28');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=28"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank28" style="cursor:pointer;" onclick="fastE('dis.asp','rank',28)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=28">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=28"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>38</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="dis.asp?act=add&amp;id=38">膜性肾炎</a></td>
                        <td>
                            <center><span id="state38" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=38','state38');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=38"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank38" style="cursor:pointer;" onclick="fastE('dis.asp','rank',38)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=38">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=38"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/dis.asp">
        </div>
    </div>
</div>
