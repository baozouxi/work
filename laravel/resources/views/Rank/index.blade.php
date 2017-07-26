<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>竞价分类</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">š</span>分类列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('rank.create') }}"><span class="icon">ŷ</span>新增分类</a></h3></div>
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
                @foreach($ranks as $rank)
                    <tr class="t1">
                        <td>
                            <center>{{ $rank->id }}</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="auc.asp?act=add&amp;id=2">{{ $rank->name }}</a></td>
                        <td>
                            <center><span id="state2" style="cursor:pointer;" onclick="fast('auc.asp?act=state&amp;id=2','state2');">{{$rank->is_use == '1' ? '正常' : '禁用'}}</span></center>
                        </td>
                        <td>
                            <center><span id="rank2" style="cursor:pointer;" onclick="fastE('auc.asp','rank',2)">{{ $rank->sort }}</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="auc.asp?act=move&amp;id=2">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="auc.asp?act=del&amp;id=2"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('rank.index') }}">
        </div>
    </div>
</div>
