<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>途径管理</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ń</span>途径列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('way.create') }}"><span class="icon">ŷ</span>新增途径</a></h3></div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="50">
                            <center>编号</center>
                        </th>
                        <th width="*">名称</th>
                        <th width="60">
                            <center>统计</center>
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
                            <center>0</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=1">网站预约</a> <span>网站上预约调用分类</span></td>
                        <td>
                            <center><em>系统</em></center>
                        </td>
                        <td>
                            <center><em>系统</em></center>
                        </td>
                        <td>
                            <center><span id="rank1" style="cursor:pointer;" onclick="fastE('way.asp','rank',1)">0</span></center>
                        </td>
                        <td>
                            <center>合并</center>
                        </td>
                        <td>
                            <center>-</center>
                        </td>
                    </tr>
               
                @foreach($ways as $way)
                    @if(is_int($loop->index/2))
                        <tr class="t2">
                    @else
                        <tr class="t1">
                    @endif
                        <td>
                            <center>{{ $way->id }}</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=6">{{ $way->name }}</a></td>
                        <td>
                            <center><span id="star6" style="cursor:pointer;" onclick="fast('way.asp?act=star&amp;id=6','star6');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="state6" style="cursor:pointer;" onclick="fast('way.asp?act=state&amp;id=6','state6');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank6" style="cursor:pointer;" onclick="fastE('way.asp','rank',6)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="way.asp?act=move&amp;id=6">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="way.asp?act=del&amp;id=6"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('way.index') }}">
        </div>
    </div>
</div>
