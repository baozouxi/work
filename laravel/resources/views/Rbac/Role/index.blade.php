<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>用户组管理</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ĵ</span>用户组列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('role.create') }}"><span class="icon">ŷ</span>新增用户组</a></h3></div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="50">
                            <center>编号</center>
                        </th>
                        <th width="*">用户组名称</th>
                        <th width="60">
                            <center>类型</center>
                        </th>
                        <th width="60">
                            <center>状态</center>
                        </th>
                        <th width="60">
                            <center>排序</center>
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
                        <td>超级管理员</td>
                        <td>
                            <center><em>系统</em></center>
                        </td>
                        <td>
                            <center><em>系统</em></center>
                        </td>
                        <td>
                            <center><span id="rank1" style="cursor:pointer;" onclick="fastE('group.asp','rank',1)">0</span></center>
                        </td>
                        <td>
                            <center><span>-</span></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>2</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=2">咨询员</a></td>
                        <td>
                            <center><span>咨询</span></center>
                        </td>
                        <td>
                            <center><span id="state2" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=2','state2');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank2" style="cursor:pointer;" onclick="fastE('group.asp','rank',2)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del2" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=2','del2');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>3</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=3">竞价员</a></td>
                        <td>
                            <center><span>不指定</span></center>
                        </td>
                        <td>
                            <center><span id="state3" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=3','state3');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank3" style="cursor:pointer;" onclick="fastE('group.asp','rank',3)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del3" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=3','del3');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>4</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=4">程序员</a></td>
                        <td>
                            <center><span>不指定</span></center>
                        </td>
                        <td>
                            <center><span id="state4" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=4','state4');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank4" style="cursor:pointer;" onclick="fastE('group.asp','rank',4)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del4" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=4','del4');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>5</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=5">导医组</a></td>
                        <td>
                            <center><span>挂号</span></center>
                        </td>
                        <td>
                            <center><span id="state5" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=5','state5');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank5" style="cursor:pointer;" onclick="fastE('group.asp','rank',5)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del5" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=5','del5');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>6</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=6">医助</a></td>
                        <td>
                            <center><span>门诊</span></center>
                        </td>
                        <td>
                            <center><span id="state6" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=6','state6');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank6" style="cursor:pointer;" onclick="fastE('group.asp','rank',6)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del6" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=6','del6');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>7</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=7">医生</a></td>
                        <td>
                            <center><span>医生</span></center>
                        </td>
                        <td>
                            <center><span id="state7" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=7','state7');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('group.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del7" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=7','del7');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>8</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=8">财务</a></td>
                        <td>
                            <center><span>不指定</span></center>
                        </td>
                        <td>
                            <center><span id="state8" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=8','state8');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank8" style="cursor:pointer;" onclick="fastE('group.asp','rank',8)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del8" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=8','del8');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>9</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=9">院长</a></td>
                        <td>
                            <center><span>不指定</span></center>
                        </td>
                        <td>
                            <center><span id="state9" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=9','state9');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank9" style="cursor:pointer;" onclick="fastE('group.asp','rank',9)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del9" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=9','del9');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>10</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=10">咨询主管</a></td>
                        <td>
                            <center><span>咨询</span></center>
                        </td>
                        <td>
                            <center><span id="state10" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=10','state10');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank10" style="cursor:pointer;" onclick="fastE('group.asp','rank',10)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del10" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=10','del10');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>11</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=11">竞价主管</a></td>
                        <td>
                            <center><span>不指定</span></center>
                        </td>
                        <td>
                            <center><span id="state11" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=11','state11');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank11" style="cursor:pointer;" onclick="fastE('group.asp','rank',11)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del11" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=11','del11');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>12</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=12">网络主管</a></td>
                        <td>
                            <center><span>咨询</span></center>
                        </td>
                        <td>
                            <center><span id="state12" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=12','state12');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank12" style="cursor:pointer;" onclick="fastE('group.asp','rank',12)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del12" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=12','del12');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>13</center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="group.asp?act=add&amp;s=1&amp;id=13">经营主管</a></td>
                        <td>
                            <center><span>门诊</span></center>
                        </td>
                        <td>
                            <center><span id="state13" style="cursor:pointer;" onclick="fast('group.asp?act=state&amp;id=13','state13');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank13" style="cursor:pointer;" onclick="fastE('group.asp','rank',13)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del13" style="color:red" onclick="if(confirm('您确定要删除这条记录吗?\n\n该操作不可恢复!\n')){fast('group.asp?act=del&amp;id=13','del13');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/group.asp">
        </div>
    </div>
</div>
