<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');" url="rank.asp">竞价记录</a><span class="ider">&gt;</span></li>
        <li><span id="guide">列表</span></li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('rank.index') }}"><span class="icon">š</span>分类管理</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ő</span>竞价列表</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fundisp()"><span class="icon">Ş</span>切换</a></p>
        </div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('rank-record.create') }}"><span class="icon">ŷ</span>新增竞价</a></h3>
            <div id="fun-n" class="right none">
                <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="rank.asp?m=">
                    <input name="ds" id="ds" class="inp" type="text" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i class="calendar icon">ğ</i>
                    <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                    <button type="submit" class="search"><span class="icon">ĺ</span></button>
                </form>
            </div>
            <div id="fun-s" class="fun-s right block">
                <select class="select" onchange="To('rank.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'','main');">
                    <option value="0">按月查询</option>
                    <option value="2017-7">2017年7月</option>
                </select>
                <select class="select" onchange="To('rank.asp?s=1&amp;n='+this.options[this.selectedIndex].value+'','main');">
                    <option value="0" selected="selected">全部来源</option>
                    <option value="2">百度PC端</option>
                    <option value="3">百度移动端</option>
                    <option value="6">神马账户</option>
                    <option value="7">搜狗账户</option>
                    <option value="8">网盟</option>
                </select>
            </div>
        </div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="80">
                            <center><a href="javascript:void(0);" url="rank.asp?t=dateline&amp;go=desc" title="按日期排序" onclick="fastH(this)">日期</a></center>
                        </th>
                        <th width="*"><a href="javascript:void(0);" url="rank.asp?t=auc&amp;go=desc" title="按来源排序" onclick="fastH(this)">来源</a></th>
                        <th width="100">
                            <center><a href="javascript:void(0);" url="rank.asp?t=cost&amp;go=desc" title="按消费排序" onclick="fastH(this)">消费</a></center>
                        </th>
                        <th width="75">
                            <center><a href="javascript:void(0);" url="rank.asp?t=show&amp;go=desc" title="按展现排序" onclick="fastH(this)">展现</a></center>
                        </th>
                        <th width="70">
                            <center><a href="javascript:void(0);" url="rank.asp?t=click&amp;go=desc" title="按点击排序" onclick="fastH(this)">点击</a></center>
                        </th>
                        <th width="85">
                            <center>点击率</center>
                        </th>
                        <th width="85">
                            <center>点击成本</center>
                        </th>
                        <th width="100">
                            <center><a href="javascript:void(0);" url="rank.asp?t=uid&amp;go=desc" title="按操作员排序" onclick="fastH(this)">操作员</a></center>
                        </th>
                        <th width="120">
                            <center><a href="javascript:void(0);" url="rank.asp?t=postdate&amp;go=desc" title="按时间排序" onclick="fastH(this)">时间</a></center>
                        </th>
                        <th width="30">
                            <center>删</center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                @foreach($records as $record)
                    <tr class="t1">
                        <td>
                            <center><a href="javascript:void(0);" title="竞价备注" onclick="fastC(this,'{{ $record->id }}');" url="rank.asp?act=show&amp;id=2">{{ formatDate($record->rank_date, 'Y-m-d') }}</a></center>
                        </td>
                        <td><span class="icon">Č</span> <a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('rank-record.edit', ['id'=>$record->id]) }}">{{ $record->rank_way }}</a></td>
                        <td>
                            <center>{{ $record->cost }}</center>
                        </td>
                        <td>
                            <center>{{ $record->show_times }}</center>
                        </td>
                        <td>
                            <center>{{ $record->click }}</center>
                        </td>
                        <td>
                            <center>{{ percent($record->click, $record->show_times, 'ceil') }}</center>
                        </td>
                        <td>
                            <center>{{ divide($record->cost, $record->click) }}</center>
                        </td>
                        <td>
                            <center>{{ $record->admin_id }}</center>
                        </td>
                        <td>
                            <center>{{ formatDate($record->add_time, 'Y-m-d H:i') }}</center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" id="del2" style="color:red" onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('rank.asp?act=del&amp;id=2','del2');}"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr id="_info{{ $record->id }}" style="display:none;" class="t1">
                        <td colspan="10" id="info{{ $record->id }}"></td>
                    </tr>
                @endforeach

                    <tr class="t1">
                        <td colspan="10">&nbsp;&nbsp;记录:<i>2</i>条</td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('rank-record.index') }}">
        </div>
    </div>
</div>
