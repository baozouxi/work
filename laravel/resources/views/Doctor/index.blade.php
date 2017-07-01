<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>医生管理</li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="msgbox(this,550);" url="dep.asp?act=tpl" class="sms"><span class="icon">ė</span>短信模版</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ō</span>医生列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('doctor.create') }}"><span class="icon">ŷ</span>新增医生</a></h3></div>
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
                            <center>模版</center>
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
                @foreach($dis as $disItem)
                    <tr class="t1">
                        <td>
                            <center>{{ $disItem['id'] }}</center>
                        </td>
                        <td><u>{{ $disItem['name'] }}</u> [<a href="javascript:void(0);" title="新增医生" onclick="msgbox(this);" url="dep.asp?act=add&amp;cid=7">+</a>]</td>
                        <td>
                            <center><span id="state7" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=7','state7');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dep.asp?act=tpl&amp;aid=7"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('dis.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center><span>-</span></center>
                        </td>
                        <td>
                            <center><span>-</span></center>
                        </td>
                    </tr>

                        @foreach($disItem['docs'] as $docItem)
                        <tr class="t2">
                            <td>
                                <center>{{ $docItem['id'] }}</center>
                            </td>
                            <td>　　├ <a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="dep.asp?act=add&amp;id=6">{{ $docItem['name'] }}</a></td>
                            <td>
                                <center><span id="bstate6" style="cursor:pointer;" onclick="fast('dep.asp?act=state&amp;id=6','bstate6');">正常</span></center>
                            </td>
                            <td>
                                <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dep.asp?act=tpl&amp;id=6"><span>全局</span></a></center>
                            </td>
                            <td>
                                <center><span id="rank6" style="cursor:pointer;" onclick="fastE('dep.asp','rank',6)">0</span></center>
                            </td>
                            <td>
                                <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dep.asp?act=move&amp;id=6">合并</a></center>
                            </td>
                            <td>
                                <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dep.asp?act=del&amp;id=6"><span class="icon"><em>ź</em></span></a></center>
                            </td>
                        </tr>
                        @endforeach

                    @endforeach


                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('doctor.index') }}">
        </div>
    </div>
</div>
