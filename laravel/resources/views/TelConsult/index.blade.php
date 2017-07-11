<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');" url="tel.asp">电话记录</a><span class="ider">&gt;</span></li>
        <li><span id="guide">列表</span></li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="fastL('tel.asp?act=com');" class="sms"><span class="icon">ƀ</span>更新状态</a><a href="javascript:void(0);" onclick="fastH(this);set_title('到期回访');" url="tel.asp?n=1" class="sms"><span class="icon">ĝ</span>到期回访</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ĕ</span>电话列表</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fundisp()"><span class="icon">Ş</span>切换</a></p>
        </div>
        <div class="fun">
        @if(check_node('tel_add'))
            <h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('tel-consult.create') }}"><span class="icon">ŷ</span>新增电话</a></h3>
        @endif
            <div id="fun-s" class="fun-s right block">
                <form name="form_key" id="form_key" onsubmit="return(fastK(this,'key'));" action="tel.asp?m=">
                    <input class="inp" id="key" name="key">
                    <button type="submit" class="search"><span class="icon">ĺ</span></button>
                </form>
            </div>
            <div id="fun-n" class="right none">
                <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="tel.asp?m=">
                    <input name="ds" id="ds" class="inp" type="text" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i class="calendar icon">ğ</i>
                    <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                    <button type="submit" class="search"><span class="icon">ĺ</span></button>
                </form>
                <select class="select" onchange="To('tel.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'','main');">
                    <option value="0">按月查询</option>
                    <option value="2017-5">2017年5月</option>
                </select>
            </div>
        </div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="120">
                            <center><a href="javascript:void(0);" url="tel.asp?t=dateline&amp;go=desc" title="按时间排序" onclick="fastH(this)">时间</a></center>
                        </th>
                        <th width="*"><a href="javascript:void(0);" url="tel.asp?t=name&amp;go=desc" title="按姓名排序" onclick="fastH(this)">姓名</a></th>
                        <th width="100">
                            <center><a href="javascript:void(0);" url="tel.asp?t=postdate&amp;go=desc" title="按回访时间排序" onclick="fastH(this)">回访时间</a></center>
                        </th>
                        <th width="60">
                            <center><a href="javascript:void(0);" url="tel.asp?t=status&amp;go=desc" title="按状态排序" onclick="fastH(this)">状态</a></center>
                        </th>
                        <th width="50">
                            <center><a href="javascript:void(0);" url="tel.asp?t=state&amp;go=desc" title="按属性排序" onclick="fastH(this)">属性</a></center>
                        </th>
                        <th width="40">
                            <center><a href="javascript:void(0);" url="tel.asp?t=gender&amp;go=desc" title="按性别排序" onclick="fastH(this)">性别</a></center>
                        </th>
                        <th width="40">
                            <center><a href="javascript:void(0);" url="tel.asp?t=age&amp;go=desc" title="按年龄排序" onclick="fastH(this)">年龄</a></center>
                        </th>
                        <th width="120">
                            <center><a href="javascript:void(0);" url="tel.asp?t=phone&amp;go=desc" title="按手机排序" onclick="fastH(this)">手机</a></center>
                        </th>
                        <th width="100">
                            <center><a href="javascript:void(0);" url="tel.asp?t=way&amp;go=desc" title="按来源排序" onclick="fastH(this)">来源</a></center>
                        </th>
                        <th width="140">
                            <center><a href="javascript:void(0);" url="tel.asp?t=local&amp;go=desc" title="按地区排序" onclick="fastH(this)">地区</a></center>
                        </th>
                        <th width="100">
                            <center><a href="javascript:void(0);" url="tel.asp?t=dis&amp;go=desc" title="按病种排序" onclick="fastH(this)">病种</a></center>
                        </th>
                        <th width="100">
                            <center><a href="javascript:void(0);" url="tel.asp?t=uid&amp;go=desc" title="按操作排序" onclick="fastH(this)">操作</a></center>
                        </th>
                        <th width="30">
                            <center>删</center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                @foreach($telConsults as $key=>$item)
                @if(is_int($key/2))
                    <tr class="t1">
                @else
                    <tr class="t2">
                @endif

                        <td>
                            <center><a href="javascript:void(0);" title="回访内容" onclick="fastC(this,'{{ $key }}');" url="{{ route('tel-consult.show',['id'=>$item['id']]) }}">{{ formatDate($item['add_time']) }}</a></center>
                        </td>
                        <td><span class="icon">Ĵ</span> 
                        @if(check_node('tel_edit'))
                        <a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('tel-consult.edit',['id'=>$item['id']]) }}"><i>{{ $item['name'] }}</i></a>
                        @else
                            <i>{{ $item['name'] }}</i>
                        @endif
                        </td>
                        <td>
                            <center><i>{{ formatDate($item['track_time'], 'm-d H:i') }}</i></center>
                        </td>
                        <td>
                            <center>
                            @if($item['status'] == '0')
                            <span style="cursor:pointer;" id="status{{$key}}" onclick="fast('{{ route("telConsultUpdateStatuss", ["id"=>$item["id"]]) }}','status{{$key}}');"><em>未处理</em></span>
                            @elseif($item['status'] == '1')
                            <span style="cursor:pointer;" id="status{{$key}}" onclick="fast('{{ route("telConsultUpdateStatuss", ["id"=>$item["id"]]) }}','status{{$key}}');">已更新</span>
                            @elseif($item['status'] == '2' )
                                <u>已预约</u>
                            @elseif($item['status'] == '3')
                                <i>已到诊</i>
                            @endif
                            </center>
                        </td>
                        <td>
                            <center>
                                {!! $item['availability'] == '1' ? "<i>有效</i>" : "无效" !!}
                            </center>
                        </td>
                        <td>
                            <center>{{ $item['gender'] == '1' ? '男' :  '女' }}</center>
                        </td>
                        <td>
                            <center>{{ $item['age'] }}</center>
                        </td>
                        <td>
                            <center>{{ $item['phone'] }}</center>
                        </td>
                        <td>
                            <center>PC商务通</center>
                        </td>
                        <td>
                            <center>{{ $item['city'] }} {{ $item['town'] }}</center>
                        </td>
                        <td>
                            <center>肾病综合征</center>
                        </td>
                        <td>
                            <center>咨询(<i>医患通</i>)</center>
                        </td>
                        <td>
                            <center>
                            @if(check_node('tel_del'))
                            <a href="javascript:void(0);" id="del4" style="color:red" onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('track.asp?act=del&amp;id=4','del4');}"><span class="icon"><em>ź</em></span></a>
                            @else
                            <span>-</span>
                            @endif
                            </center>
                        </td>
                    </tr>
                    <tr id="_info{{$key}}" style="display:none;" class="t1">
                        <td colspan="13" id="info{{$key}}"></td>
                    </tr>
                @endforeach

                    <tr class="t1">
                        <td colspan="13">&nbsp;&nbsp;记录:<i>5</i>条</td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/tel.asp">
        </div>
    </div>
</div>
