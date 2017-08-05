
    <!--导航-->
    <div class="guide">
    <script type="text/javascript">
        var box = 'main';
    </script>
        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
           {!! guideHtml('患者列表', route('patient.index')) !!}
           {!! guideHtml('列表') !!}
        </ul>
        <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this);set_title('需要跟踪');" url="turn.asp?n=2&amp;m=turn" class="call"><span class="icon">Ę</span>需要跟踪</a><a href="javascript:void(0);" onclick="fastH(this, 'main');set_title('到期回访');" url="{{ route('patientNeedTrack') }}" class="sms"><span class="icon">ĝ</span>到期回访</a><a href="javascript:void(0);" onclick="fastH(this,'main');set_title('今日到诊');" url="/patient/come/today" class="sms"><span class="icon">Ğ</span>今日到诊</a></p>
    </div>
    <div id="wrap" class="wrap">
        <!--整体内容-->
        <div id="container" class="container">
            <div class="top">
                <h3 class="left"><span class="icon">Ķ</span>患者列表</h3>
                <p class="nlink right"><a href="javascript:void(0);" onclick="fundisp()"><span class="icon">Ş</span>切换</a><a href="javascript:void(0);" title="显示表格" onclick="msgbox(this,600);" url="{{ $fieldUrl }}" class="config"><span class="icon">Ƅ</span>设置</a>
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
                        @foreach($fields_list as $list)
                            <th width="{{ $list['width'] }}">
                                <center><a href="javascript:void(0);" url="turn.asp?t=id&amp;go=desc&amp;m=turn" title="按编号排序" onclick="fastH(this)">{{ $list['name'] }}</a></center>
                            </th>
                        @endforeach
<!--                             <th width="120">
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
                            </th> -->
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                    @foreach($data as $key => $item)
                    @if(is_int($key/2))
                        <tr class="t1">
                    @else
                        <tr class="t2">
                    @endif
                           @foreach($item as $v)
                            {!! $v !!}
                           @endforeach
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
                            <td colspan="20">&nbsp;&nbsp;记录:<i>{{ $count }}</i>条</td>
                        </tr>
                    @endif
                        
                    </tbody>
                </table>
                <input type="hidden" name="this_url" id="this_url" value="{{ route('patient.index') }}">
            </div>
        </div>
    </div>

