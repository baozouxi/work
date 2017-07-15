

    <!--导航-->
    <div class="guide">
    <script type="text/javascript">
        var box = 'main';
    </script>
        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
            <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');" url="">患者列表</a><span class="ider">&gt;</span></li>
            <li><span id="guide">列表</span></li>
        </ul>
        <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this);set_title('需要跟踪');" url="turn.asp?n=2&amp;m=turn" class="call"><span class="icon">Ę</span>需要跟踪</a><a href="javascript:void(0);" onclick="fastH(this, 'main');set_title('到期回访');" url="{{ route('patientNeedTrack') }}" class="sms"><span class="icon">ĝ</span>到期回访</a><a href="javascript:void(0);" onclick="fastH(this,'main');set_title('今日到诊');" url="/patient/come/today" class="sms"><span class="icon">Ğ</span>今日到诊</a></p>
    </div>
    <div id="wrap" class="wrap">
        <!--整体内容-->
        <div id="container" class="container">
            <div class="top">
                <h3 class="left"><span class="icon">Ķ</span>患者列表</h3>
                <p class="nlink right"><a href="javascript:void(0);" onclick="fundisp()"><span class="icon">Ş</span>切换</a><a href="javascript:void(0);" title="显示表格" onclick="msgbox(this,600);" url="user.asp?act=turn" class="config"><span class="icon">Ƅ</span>设置</a>
                @if(check_node('patient_export'))
                <a href="javascript:void(0);" title="导出电子表格" onclick="msgbox(this);" url="{{ route('patientExportHtml') }}" class="excel"><span class="icon">Ľ</span>导出</a>
                @endif
                </p>
            </div>
            <div class="fun">
            @if(check_node('patient_add'))
                <h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('patient.create') }}"><span class="icon">ŷ</span>新增患者</a></h3>
            @endif
                <div id="fun-s" class="fun-s right block">
                    <form name="form_key" id="form_key" onsubmit="return(fastK(this,'key'));" action="/patient/search/">
                        <input class="inp" id="key" name="key">
                        <button type="submit" class="search"><span class="icon">ĺ</span></button>
                    </form>
                </div>
                <div id="fun-n" class="right none">
                    <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="/patient/month/">
                        <input name="ds" id="ds" class="inp" type="text" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i class="calendar icon">ğ</i>
                        <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                        <button type="submit" class="search"><span class="icon">ĺ</span></button>
                    </form>
                 <!--    <select class="select" onchange="To('turn.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'&amp;m=turn','main');">
                        <option value="0">按月查询</option>
                        <option value="2017-5">2017年5月</option>
                    </select> -->
                </div>
            </div>
            <div id="box" class="box">
                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="50">
                                <center><a href="javascript:void(0);" url="turn.asp?t=id&amp;go=desc&amp;m=turn" title="按编号排序" onclick="fastH(this)">编号</a></center>
                            </th>
                            <th width="120">
                                <center><a href="javascript:void(0);" url="turn.asp?t=dateline&amp;go=desc&amp;m=turn" title="按时间排序" onclick="fastH(this)">时间</a></center>
                            </th>
                            <th width="120">
                                <center><a href="javascript:void(0);" url="turn.asp?t=dateline&amp;go=desc&amp;m=turn" title="按时间排序" onclick="fastH(this)">病历号</a></center>
                            </th>
                            <th width="*"><a href="javascript:void(0);" url="turn.asp?t=name&amp;go=desc&amp;m=turn" title="按姓名排序" onclick="fastH(this)">姓名</a></th>

                            <th width="50">
                                <center><a href="javascript:void(0);" url="turn.asp?t=gender&amp;go=desc&amp;m=turn" title="按性别排序" onclick="fastH(this)">性别</a></center>
                            </th>
                            <th width="120">
                                <center><a href="javascript:void(0);" url="turn.asp?t=dateline&amp;go=desc&amp;m=turn" title="按时间排序" onclick="fastH(this)">电话</a></center>
                            </th>
                            <th width="50">
                                <center><a href="javascript:void(0);" url="turn.asp?t=age&amp;go=desc&amp;m=turn" title="按年龄排序" onclick="fastH(this)">年龄</a></center>
                            </th>
                            <th width="80">
                                <center><a href="javascript:void(0);" url="turn.asp?t=money&amp;go=desc&amp;m=turn" title="按消费排序" onclick="fastH(this)">消费</a></center>
                            </th>
                            <th width="140">
                                <center><a href="javascript:void(0);" url="turn.asp?t=local&amp;go=desc&amp;m=turn" title="按地区排序" onclick="fastH(this)">地区</a></center>
                            </th>
                            <th width="100">
                                <center><a href="javascript:void(0);" url="turn.asp?t=ads&amp;go=desc&amp;m=turn" title="按媒介排序" onclick="fastH(this)">媒介</a></center>
                            </th>
                            <th width="100">
                                <center><a href="javascript:void(0);" url="turn.asp?t=dis&amp;go=desc&amp;m=turn" title="按病种排序" onclick="fastH(this)">病种</a></center>
                            </th>
                            <th width="100">
                                <center><a href="javascript:void(0);" url="turn.asp?t=dep&amp;go=desc&amp;m=turn" title="按医生排序" onclick="fastH(this)">医生</a></center>
                            </th>
                            <th width="100">
                                <center><a href="javascript:void(0);" url="turn.asp?t=postdate&amp;go=desc&amp;m=turn" title="按回访时间排序" onclick="fastH(this)">回访时间</a></center>
                            </th>
                            <th width="120">
                                <center><a href="javascript:void(0);" url="turn.asp?t=uid&amp;go=desc&amp;m=turn" title="按操作员排序" onclick="fastH(this)">操作员</a></center>
                            </th>
                            <th width="30">
                                <center>删</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                    @foreach($data as $key => $item)
                    @if(is_int($key/2))
                        <tr class="t1">
                    @else
                        <tr class="t2">
                    @endif
                            <td>
                                <center>{{ $item->id }}</center>
                            </td>
                            <td>
                                <center>{{ formatDate($item->add_time) }}</center>
                            </td>
                            <td>
                                <center>{!! $item->medical_num !!}</center>
                            </td>
                           <td>
                            <span title="“{{ $item->name }}”的详细资料" onclick="msgbox(this,600);" url="{{ route('patient.show', ['id'=>$item->id]) }}" style="cursor:pointer;" class="icon">Ĵ
                            </span>
                            @if(check_node('patient_edit'))
                                <a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('patient.edit', ['id'=>$item->id]) }}">
                                @if($item->book_id == '0')
                                    <u>{!!$item->name !!}</u>
                                @else
                                    <i>{!! $item->name !!}</i>
                                @endif
                                </a>
                            @else
                                @if($item->book_id == '0')
                                    <u>{!! $item->name !!}</u>
                                @else
                                    <i>{!! $item->name !!}</i>
                                @endif

                            @endif
                            </td>


                            <td>
                                <center><u>{{ $item->gender == '1' ? '男' : '女' }}</u></center>
                            </td>
                            <td>
                                <center>{!! $item->phone !!}</center>
                            </td>
                            <td>
                                <center>{{ $item->age }}</center>
                            </td>
                            <td>
                                <center>
                                @if(check_node('take_show'))
                                    @if(check_node('take_edit'))
                                        <a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('takeWithInfo',['patientId'=>$item->id]) }}">{{ $item->sum or '0' }}</a>
                                    @else
                                        <a>{{ $item->sum or '0' }}</a>
                                    @endif
                                @else
                                    @if(check_node('take_edit'))
                                        <a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('takeWithInfo',['patientId'=>$item->id]) }}">0</a>
                                    @else
                                        <i>0</i>
                                    @endif
                                @endif
                                </center>
                            </td>
                            <td>
                                <center>{{ $item->city }} {{ $item->town }}</center>
                            </td>
                            <td>
                                <center>PC商务通</center>
                            </td>
                            <td>
                                <center>肾病综合征</center>
                            </td>
                            <td>
                                <center>赵中献</center>
                            </td>
                            <td>
                                <center><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('trackWithInfo',['id'=>$item->id]) }}">
                                @if(count($item->tracks) < 1)
                                    <span>没有记录</span>
                                @else
                                    {{ formatDate($item->tracks['0']['next_time'], 'm-d H:i') }}({{ count($item->tracks) }})
                                @endif
                                </a>
                                </center>
                            </td>
                            <td>
                                <center>咨询(<i>导医</i>)</center>
                            </td>
                            <td>
                                <center>
                                @if($item->book_id == '0')
                                    @if(check_node('patient_del'))
                                    <a href="javascript:void(0);" id="del{{$item->id}}" onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fastDel('{{ route('patient.destroy',['id'=>$item->id]) }}','del{{$item->id}}','{{ csrf_token() }}');}"><span class="icon"><em>ź</em></span>
                                    </a>
                                    @else
                                         <span>-</span>      
                                    @endif
                                @else
                                    <span>-</span>
                                @endif
                                </center>
                            </td>
                        </tr>
                    @endforeach
                    
                    
                    @if($count > 20)
                        <tr class="t1">
                            <td colspan="21">
                                <center>
                                记录：{{ $count }} {{ $data->links() }}
                                </center>
                           </td>
                        </tr>
                    @else
                        <tr class="t1">
                            <td colspan="13">&nbsp;&nbsp;记录:<i>{{ $count }}</i>条</td>
                        </tr>
                    @endif
                        
                    </tbody>
                </table>
                <input type="hidden" name="this_url" id="this_url" value="/turn.asp?m=turn">
            </div>
        </div>
    </div>

