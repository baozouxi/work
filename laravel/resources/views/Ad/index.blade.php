<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        <li>媒介管理</li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="msgbox(this,550);" url="ads.asp?act=tpl" class="sms"><span class="icon">ė</span>短信模版</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ě</span>媒介列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('ad.create') }}"><span class="icon">ŷ</span>新增媒介</a></h3></div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="50">
                            <center>编号</center>
                        </th>
                        <th width="*">名称</th>
<!--                         <th width="260">
                            <center>接收短信手机号</center>
                        </th>
                        <th width="260">
                            <center>接收信息QQ号</center>
                        </th> -->
                        <th width="60">
                            <center>模版</center>
                        </th>
                        <th width="60">
                            <center>状态</center>
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
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="ads.asp?act=add&amp;id=1">网络预约</a> <span>本类新增患者不显示</span></td>
                      <!--   <td>&nbsp;</td>
                        <td>&nbsp;</td> -->
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="ads.asp?act=tpl&amp;id=1"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><em>系统</em></center>
                        </td>
                        <td>
                            <center><span>0</span></center>
                        </td>
                        <td>
                            <center>合并</center>
                        </td>
                        <td>
                            <center>-</center>
                        </td>
                    </tr>
                    @foreach($ads as $ad)
                    @if(is_int($loop->index/2))
                        <tr class="t2">
                    @else
                        <tr class="t1">
                    @endif
                        <td>
                            <center>{{ $ad->id }}</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="ads.asp?act=add&amp;id=2">{{ $ad->name }}</a></td>
                    <!--     <td>&nbsp;</td>
                        <td>&nbsp;</td> -->
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="ads.asp?act=tpl&amp;id=2"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="state2" style="cursor:pointer;" onclick="fast('ads.asp?act=state&amp;id=2','state2');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank2" style="cursor:pointer;" onclick="fastE('ads.asp','rank',2)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="ads.asp?act=move&amp;id=2">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="ads.asp?act=del&amp;id=2"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('ad.index') }}">
        </div>
    </div>
</div>
