<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        <li>用户管理</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ĵ</span>用户列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('user.create') }}"><span class="icon">ŷ</span>新增用户</a></h3></div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="50">
                            <center>编号</center>
                        </th>
                        <th width="120">
                            <center>用户组/角色</center>
                        </th>
                        <th width="*">用户名/登录名</th>
                        <th width="60">
                            <center>状态</center>
                        </th>
                        <th width="120">
                            <center>手机</center>
                        </th>
                        <th width="120">
                            <center>QQ</center>
                        </th>
                        <th width="120">
                            <center>微信</center>
                        </th>
                        <th width="60">
                            <center>属性</center>
                        </th>
                        <th width="60">
                            <center>排序</center>
                        </th>
                        <th width="60">
                            <center>登陆</center>
                        </th>
                        <th width="120">
                            <center>最后登陆</center>
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
                @foreach($user as $userItem)
                    <tr class="t1">
                        <td>
                            <center>{{ $userItem->id }}</center>
                        </td>
                        <td><center>
                            <i>
                            {{ isset($role[$userItem->role_id]) ? $role[$userItem->role_id] : '暂无角色' }}
                            </i>
                        </center>
                        </td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="user.asp?act=add&amp;s=1&amp;id=2">{{ $userItem->name }}</a> 
                        <span style="text-transform:uppercase;">
                            {{ strtoupper($userItem->username) }}
                        </span></td>
                        <td>
                            <center><span id="online2" style="cursor:pointer;" onclick="fast('user.asp?act=online&amp;id=2','online2');" title="踢出后台">离线</span></center>
                        </td>
                        <td>
                            <center>{{ $userItem->tel }}</center>
                        </td>
                        <td>
                            <center>{{ $userItem->qq }}</center>
                        </td>
                        <td>
                            <center>{{ $userItem->weixin }}</center>
                        </td>
                        <td>
                            <center><span id="state2" style="cursor:pointer;" onclick="fast('user.asp?act=state&amp;id=2','state2');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank2" style="cursor:pointer;" onclick="fastE('user.asp','rank',2)">0</span></center>
                        </td>
                        <td>
                            <center>9</center>
                        </td>
                        <td>
                            <center>06-02 09:15</center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="user.asp?act=move&amp;id=2">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="user.asp?act=del&amp;id=2"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                @endforeach
<!--                     <tr class="t2">
                        <td>
                            <center>3</center>
                        </td>
                        <td><i>导医组</i><span>(挂号)</span></td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="user.asp?act=add&amp;s=1&amp;id=3">导医</a> <span style="text-transform:uppercase;">daoyi</span></td>
                        <td>
                            <center><span id="online3" style="cursor:pointer;" onclick="fast('user.asp?act=online&amp;id=3','online3');" title="踢出后台">离线</span></center>
                        </td>
                        <td>
                            <center>13228595551</center>
                        </td>
                        <td>
                            <center>253120625</center>
                        </td>
                        <td>
                            <center>13228595558</center>
                        </td>
                        <td>
                            <center><span id="state3" style="cursor:pointer;" onclick="fast('user.asp?act=state&amp;id=3','state3');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank3" style="cursor:pointer;" onclick="fastE('user.asp','rank',3)">0</span></center>
                        </td>
                        <td>
                            <center>6</center>
                        </td>
                        <td>
                            <center>05-18 15:55</center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="user.asp?act=move&amp;id=3">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="user.asp?act=del&amp;id=3"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>4</center>
                        </td>
                        <td><i>医助</i><span>(门诊)</span></td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="user.asp?act=add&amp;s=1&amp;id=4">一株</a> <span style="text-transform:uppercase;">yizhu</span></td>
                        <td>
                            <center><span id="online4" style="cursor:pointer;" onclick="fast('user.asp?act=online&amp;id=4','online4');" title="踢出后台">离线</span></center>
                        </td>
                        <td>
                            <center>13228595550</center>
                        </td>
                        <td>
                            <center>253120625</center>
                        </td>
                        <td>
                            <center>13228595558</center>
                        </td>
                        <td>
                            <center><span id="state4" style="cursor:pointer;" onclick="fast('user.asp?act=state&amp;id=4','state4');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank4" style="cursor:pointer;" onclick="fastE('user.asp','rank',4)">0</span></center>
                        </td>
                        <td>
                            <center>54</center>
                        </td>
                        <td>
                            <center>07-01 14:03</center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="user.asp?act=move&amp;id=4">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="user.asp?act=del&amp;id=4"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>5</center>
                        </td>
                        <td><i>医生</i><span>(医生)</span></td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="user.asp?act=add&amp;s=1&amp;id=5">yisheng</a> <span style="text-transform:uppercase;">yisheng</span></td>
                        <td>
                            <center><span id="online5" style="cursor:pointer;" onclick="fast('user.asp?act=online&amp;id=5','online5');" title="踢出后台">离线</span></center>
                        </td>
                        <td>
                            <center>13228594612</center>
                        </td>
                        <td>
                            <center>256121231</center>
                        </td>
                        <td>
                            <center>13228595558</center>
                        </td>
                        <td>
                            <center><span id="state5" style="cursor:pointer;" onclick="fast('user.asp?act=state&amp;id=5','state5');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank5" style="cursor:pointer;" onclick="fastE('user.asp','rank',5)">0</span></center>
                        </td>
                        <td>
                            <center>6</center>
                        </td>
                        <td>
                            <center>05-19 09:37</center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="user.asp?act=move&amp;id=5">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="user.asp?act=del&amp;id=5"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>6</center>
                        </td>
                        <td><i>竞价员</i></td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="user.asp?act=add&amp;s=1&amp;id=6">竞价</a> <span style="text-transform:uppercase;">jingjia</span></td>
                        <td>
                            <center><span id="online6" style="cursor:pointer;" onclick="fast('user.asp?act=online&amp;id=6','online6');" title="踢出后台">离线</span></center>
                        </td>
                        <td>
                            <center>13225641321</center>
                        </td>
                        <td>
                            <center>253120625</center>
                        </td>
                        <td>
                            <center>13228595558</center>
                        </td>
                        <td>
                            <center><span id="state6" style="cursor:pointer;" onclick="fast('user.asp?act=state&amp;id=6','state6');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank6" style="cursor:pointer;" onclick="fastE('user.asp','rank',6)">0</span></center>
                        </td>
                        <td>
                            <center>2</center>
                        </td>
                        <td>
                            <center>05-18 16:24</center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="user.asp?act=move&amp;id=6">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="user.asp?act=del&amp;id=6"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>7</center>
                        </td>
                        <td><i>导医组</i><span>(挂号)</span></td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="user.asp?act=add&amp;s=1&amp;id=7">测试修改</a> <span style="text-transform:uppercase;">xiugai</span></td>
                        <td>
                            <center><span id="online7" style="cursor:pointer;" onclick="fast('user.asp?act=online&amp;id=7','online7');" title="踢出后台">离线</span></center>
                        </td>
                        <td>
                            <center>13228595515</center>
                        </td>
                        <td>
                            <center>253120625</center>
                        </td>
                        <td>
                            <center>13228595558</center>
                        </td>
                        <td>
                            <center><span id="state7" style="cursor:pointer;" onclick="fast('user.asp?act=state&amp;id=7','state7');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('user.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center>2</center>
                        </td>
                        <td>
                            <center>05-19 09:40</center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="user.asp?act=move&amp;id=7">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="user.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>8</center>
                        </td>
                        <td><i>医助</i><span>(门诊)</span></td>
                        <td><a href="javascript:void(0);" onclick="fastH(this,'main')" url="user.asp?act=add&amp;s=1&amp;id=8">acz</a> <span style="text-transform:uppercase;">admib</span></td>
                        <td>
                            <center><span id="online8" style="cursor:pointer;" onclick="fast('user.asp?act=online&amp;id=8','online8');" title="踢出后台">离线</span></center>
                        </td>
                        <td>
                            <center><span>-</span></center>
                        </td>
                        <td>
                            <center><span>-</span></center>
                        </td>
                        <td>
                            <center><span>-</span></center>
                        </td>
                        <td>
                            <center><span id="state8" style="cursor:pointer;" onclick="fast('user.asp?act=state&amp;id=8','state8');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank8" style="cursor:pointer;" onclick="fastE('user.asp','rank',8)">0</span></center>
                        </td>
                        <td>
                            <center><span>-</span></center>
                        </td>
                        <td>
                            <center><span>-</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="user.asp?act=move&amp;id=8">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="user.asp?act=del&amp;id=8"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr> -->
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('user.index') }}">
        </div>
    </div>
</div>
