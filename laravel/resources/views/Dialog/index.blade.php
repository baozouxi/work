<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');" url="dia.asp">对话记录</a><span class="ider">&gt;</span></li>
        <li><span id="guide">列表</span></li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="fastL('dia.asp?act=up&amp;key=500');" class="sms"><span class="icon">ħ</span>纠正全部</a><a href="javascript:void(0);" onclick="fastL('dia.asp?act=up');" class="sms"><span class="icon">ē</span>纠正数据</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">İ</span>对话列表</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fundisp()"><span class="icon">Ş</span>切换</a></p>
        </div>
        <div class="fun">
        @if(check_node('dialog_add'))
            <h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('dialog.create') }}"><span class="icon">ŷ</span>新增对话</a></h3>
        @endif
            <div id="fun-n" class="right none">
                <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="dia.asp?m=">
                    <input name="ds" id="ds" class="inp" type="text" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i class="calendar icon">ğ</i>
                    <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                    <button type="submit" class="search"><span class="icon">ĺ</span></button>
                </form>
            </div>
            <div id="fun-s" class="fun-s right block">
                <select class="select" onchange="To('dia.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'','main');">
                    <option value="0">按月查询</option>
                    <option value="2017-6">2017年6月</option>
                </select>
                <select class="select" onchange="To('dia.asp?s=1&amp;n='+this.options[this.selectedIndex].value+'','main');">
                    <option value="0" selected="selected">所有用户</option>
                    <option value="1">医患通</option>
                    <option value="2">咨询</option>
                </select>
            </div>
        </div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="80">
                            <center><a href="javascript:void(0);" url="dia.asp?t=dateline&amp;go=asc" title="按日期排序" onclick="fastH(this)">日期</a>▲</center>
                        </th>
                        <th width="*"><a href="javascript:void(0);" url="dia.asp?t=uid&amp;go=desc" title="按用户排序" onclick="fastH(this)">用户</a></th>
                        <th width="38">
                            <center><a href="javascript:void(0);" url="dia.asp?t=dia&amp;go=desc" title="按对话排序" onclick="fastH(this)">对话</a></center>
                        </th>
                        <th width="38">
                            <center><a href="javascript:void(0);" url="dia.asp?t=res&amp;go=desc" title="按预约排序" onclick="fastH(this)">预约</a></center>
                        </th>
                        <th width="38">
                            <center><a href="javascript:void(0);" url="dia.asp?t=turn&amp;go=desc" title="按到诊排序" onclick="fastH(this)">到诊</a></center>
                        </th>
                        <th width="*" colspan="3">
                            <center><a href="javascript:void(0);" url="dia.asp?t=dia_6&amp;go=desc" title="按PC商务通排序" onclick="fastH(this)">PC商务通</a></center>
                        </th>
                        <th width="*" colspan="3">
                            <center><a href="javascript:void(0);" url="dia.asp?t=dia_33&amp;go=desc" title="按抓取电话排序" onclick="fastH(this)">抓取电话</a></center>
                        </th>
                        <th width="80">
                            <center><a href="javascript:void(0);" url="dia.asp?t=postdate&amp;go=desc" title="按时间排序" onclick="fastH(this)">时间</a></center>
                        </th>
                        <th width="30">
                            <center>删</center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                @foreach($dialogs as $key => $item)
                @if(is_int($key/2))
                    <tr class="t1">
                @else
                    <tr class="t2">
                @endif
                        <td>
                            <center><a href="javascript:void(0);" title="回访内容" onclick="fastC(this,'11');" url="dia.asp?act=show&amp;id=11">{{formatDate($item['date'], 'Y-m-d')}}</a></center>
                        </td>
                        <td><span class="icon">Ĵ</span> 
                        @if(check_node('dialog_edit'))
                        <a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('dialog.edit',['id'=>$item['id']]) }}">{{ $item['admin_id'] }}</a>
                        @else
                            <i>{{ $item['admin_id'] }}</i>
                        @endif
                        </td>
                        <td>
                            <center>{{ $item['pcswt'] + $item['zhuaqu'] }}</center>
                        </td>
                        <td>
                            <center>{{ count($item['appoint'], 1) - count($item['appoint']) }}</center>
                        </td>
                        <td>
                            <center>{{ count($item['patient']) }}</center>
                        </td>
                        <td width="20">
                            <center>{{ $item['pcswt'] }}</center>
                        </td>
                        <td width="20">
                            <center></center>
                        </td>
                        <td width="20">
                            <center></center>
                        </td>
                        <td width="20">
                            <center>{{ $item['zhuaqu'] }}</center>
                        </td>
                        <td width="20">
                            <center></center>
                        </td>
                        <td width="20">
                            <center></center>
                        </td>
                        <td>
                            <center>06-23 17:48</center>
                        </td>
                        <td>
                            <center>
                            @if(check_node('dialog_edit'))
                            <a href="javascript:void(0);" id="del11" style="color:red" onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('dia.asp?act=del&amp;id=11','del11');}"><span class="icon"><em>ź</em></span></a>
                            @else
                                <span>-</span>
                            @endif
                            </center>
                        </td>
                    </tr>
                    <tr id="_info11" style="display:none;" class="t1">
                        <td colspan="13" id="info11"></td>
                    </tr>
                @endforeach
                    <tr class="t1">
                        <td colspan="13">&nbsp;&nbsp;记录:<i>8</i>条</td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/dia.asp?t=dateline&amp;go=desc">
        </div>
    </div>
</div>
