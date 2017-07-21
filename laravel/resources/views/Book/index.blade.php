

    <!--导航-->
    <div class="guide">
        <script type="text/javascript">
            var box = 'main';
        </script>

        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
            {!! guideHtml('预约列表', route('book.index')) !!}
            {!! guideHtml('列表') !!}
        </ul>
        <p class="nlink right">
    <!--     <a href="javascript:void(0);" onclick="fastH(this);set_title('取消跟踪');" url="res.asp?n=4&amp;m=res" class="call"><span class="icon">Ŝ</span>取消跟踪</a>
        <a href="javascript:void(0);" onclick="fastH(this);set_title('需要跟踪');" url="res.asp?n=2&amp;m=res" class="call"><span class="icon">Ę</span>需要跟踪</a>
        <a href="javascript:void(0);" onclick="fastH(this);set_title('到期回访');" url="res.asp?n=1&amp;m=res" class="sms"><span class="icon">ĝ</span>到期回访</a> -->
        <a href="javascript:void(0);" onclick="fastH(this, 'main');set_title('预约库存');" url="{{ route('bookResidue') }}" class="sms"><span class="icon">ğ</span>预约库存</a>
        <a href="javascript:void(0);" onclick="fastH(this, 'main');set_title('预约明日');" url="{{ route('bookTomorrow') }}" class="sms"><span class="icon">Š</span>预约明日</a>
        <a href="javascript:void(0);" onclick="fastH(this, 'main');set_title('预约今日');" url="{{ route('bookToday') }}" class="sms"><span class="icon">Ğ</span>预约今日</a>
        </p>
    </div>
    <div id="wrap" class="wrap">
        <!--整体内容-->
        <div id="container" class="container">
            <div class="top">
                <h3 class="left"><span class="icon">Ĵ</span>预约列表</h3>
                <p class="nlink right"><a href="javascript:void(0);" title="显示表格" onclick="msgbox(this,600);" url="user.asp?act=res" class="config"><span class="icon">Ƅ</span>设置</a><a href="javascript:void(0);" onclick="fundisp()"><span class="icon">Ş</span>切换</a>
                <a href="javascript:void(0);" title="导出电子表格" onclick="msgbox(this);" url="{{ route('bookExportHtml') }}" class="excel"><span class="icon">Ľ</span>导出</a>
                </p>
            </div>
            <div class="fun">
            @if(check_node('book_add'))
                <h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('book.create') }}"><span class="icon">ŷ</span>新增预约</a></h3>
            @endif
                <div id="fun-s" class="fun-s right block">
                    <form name="form_key" id="form_key" onsubmit="return(fastK(this,'key'));" action="/book/search/">
                        <input class="inp" id="key" name="key">
                        <button type="submit" class="search"><span class="icon">ĺ</span></button>
                    </form>
                </div>
                <div id="fun-n" class="right none">
                    <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="res.asp?m=res">
                        <input id="mo" name="mo" value="postdate" type="hidden">
                        <input name="ds" id="ds" class="inp" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-{%M+1}-%d\'}'})" type="text"><i class="calendar icon">ğ</i>
                        <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-{%M+1}-%d'})">
                        <button type="submit" class="search"><span class="icon">ĺ</span></button>
                    </form>
                    <select class="select" onchange="To('res.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'&amp;m=res','main');">
                        <option value="0">按月查询</option>
                        <option value="2017-5">2017年5月</option>
                        <option value="2017-4">2017年4月</option>
                    </select>
                </div>
            </div>
            <div id="box" class="box">
                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="120">
                                <center><a href="javascript:void(0);" url="res.asp?t=dateline&amp;go=desc&amp;m=res" title="按时间排序" onclick="fastH(this)">时间</a></center>
                            </th>
                           
                            <th width="50">
                                <center><a href="javascript:void(0);" url="res.asp?t=key&amp;go=desc&amp;m=res" title="按预约号排序" onclick="fastH(this)">预约号</a></center>
                            </th>
                            <th width="80"><center>属性</center></th>
                            <th width="*"><a href="javascript:void(0);" url="res.asp?t=bid&amp;go=desc&amp;m=res" title="按姓名排序" onclick="fastH(this)">姓名</a></th>
                            <th width="50">
                                <center><a href="javascript:void(0);" url="res.asp?t=file&amp;go=desc&amp;m=res" title="按附件排序" onclick="fastH(this)">附件</a></center>
                            </th>
                            <th width="50">
                                <center><a href="javascript:void(0);" url="res.asp?t=gender&amp;go=desc&amp;m=res" title="按性别排序" onclick="fastH(this)">性别</a></center>
                            </th>
                            <th width="50">
                                <center><a href="javascript:void(0);" url="res.asp?t=age&amp;go=desc&amp;m=res" title="按年龄排序" onclick="fastH(this)">年龄</a></center>
                            </th>
                            <th width="140">
                                <center><a href="javascript:void(0);" url="res.asp?t=local&amp;go=desc&amp;m=res" title="按地域排序" onclick="fastH(this)">地域</a></center>
                            </th>
                            <th width="100">
                                <center><a href="javascript:void(0);" url="res.asp?t=dis&amp;go=desc&amp;m=res" title="按病种排序" onclick="fastH(this)">病种</a></center>
                            </th>
                            <!-- <th width="110">
                                <center><a href="javascript:void(0);" url="res.asp?t=dep&amp;go=desc&amp;m=res" title="按医生排序" onclick="fastH(this)">医生</a></center>
                            </th> -->
                            <th width="100">
                                <center><a href="javascript:void(0);" url="res.asp?t=way&amp;go=desc&amp;m=res" title="按途径排序" onclick="fastH(this)">途径</a></center>
                            </th>
                            <th width="100">
                                <center><a href="javascript:void(0);" url="res.asp?t=postdate&amp;go=desc&amp;m=res" title="按预约到诊排序" onclick="fastH(this)">预约到诊</a></center>
                            </th>
                            <th width="110">
                                <center><a href="javascript:void(0);" url="res.asp?t=t_date&amp;go=desc&amp;m=res" title="按回访时间排序" onclick="fastH(this)">回访时间</a></center>
                            </th>
                            <th width="110">
                                <center><a href="javascript:void(0);" url="res.asp?t=uid&amp;go=desc&amp;m=res" title="按录入员排序" onclick="fastH(this)">录入员</a></center>
                            </th>
                            <th width="30"><center>删</center></th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">

                    @foreach ($data as $key => $item)
                        @if( is_int($key/2))
                            <tr class="t1">
                        @else
                            <tr class="t2">
                        @endif

                            <td>
                                <center>{{ date('Y-m-d H:i', strtotime($item['add_time'])) }}</center>
                            </td>
                            <td>
                                <center>{{ $item['id']  }}</center>
                            </td> 
                            <td>
                                <center>
                                @if($item->status == '1')
                                    <u class="icon">ű 未到诊</u>
                                @elseif($item->status == '2')
                                    <i class="icon">Ű 已到诊</i>
                                @elseif($item->status == '3') 
                                    <em class="icon">Ų 已逾期</em>
                                @endif
                                    
                                </center>
                            </td>
                            <td>
                                <span title="“{{ $item['name']  }}”的详细资料" onclick="msgbox(this,600);" url="{{ route('book.show', ['id'=>$item['id'] ]) }}" style="cursor:pointer;" class="icon">Ĵ
                                </span> 
                                @if(check_node('book_edit'))
                                    <a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ $item->url }}">
                                    @if($item->status == '1')
                                        <u>{{ $item['name']  }}</u> 
                                    @elseif($item->status == '2')
                                        <i>{{ $item['name']  }}</i>
                                    @elseif($item->status == '3') 
                                        <em>{{ $item['name'] }}</em>
                                    @endif
                                    </a>
                                @else
                                    @if($item->status == '1')
                                        <u>{{ $item['name']  }}</u> 
                                    @elseif($item->status == '2')
                                        <i>{{ $item['name']  }}</i>
                                    @elseif($item->status == '3') 
                                        <em>{{ $item['name'] }}</em>
                                    @endif
                                @endif
                            </td>
                            
                            <td>   
                                @if(isset($item['chatlog'] ))
                                    <center class="file">
                                        <a href="javascript:void(0);" title="“{{ $item['name'] }}”预约号{{ $item['id'] }}的咨询记录" onclick="msgbox(this,850);" url="{{ route('chatlog',['id'=>$item['chatlog'] ]) }}">
                                        <span class="icon">ĉ</span>
                                        </a>
                                    </center>
                                @else
                                    <center><span class="icon">-</span></center>
                                @endif
                            </td>

                            <td>
                                <center><u>{{ $item['gender'] == '1' ? '男' : '女' }}</u></center>
                            </td>
                            <td>
                                <center>{{ $item['age'] }}</center>
                            </td>
                            <td>
                                <center>{{ $item['city']  }} {{ $item['town']  }} </center>
                            </td>
                            <td>
                                <center>{{ $item['disease'] }}</center>
                            </td>
                           <!--  <td>
                                <center>医生</center>
                            </td> -->
                            <td>
                                <center>{{ $item->way }}</center>
                            </td>
                            <td>
                                <center>{{ date('m-d H:i', strtotime($item->postdate)) }}</center>
                            </td>
                            <td>
                                <center>
                                    <a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('booktrack.show', ['id'=>$item['id'] ])}}">
                                    @if(count($item['track']) < 1)
                                        <span>没有记录</span>
                                    @else
                                        <i>{{ date('m-d H:i', strtotime($item['track'][0]['next_time'])) }}({{ count($item['track']) }})</i>
                                    @endif
                                    </a>
                                </center>
                            </td>
                            <td>
                                <center>{{ $admin[$item->admin_id]['name'] }}</center>
                            </td>
                            
                            <td>
                                <center>
                                    @if($item->is_hospital == '0')
                                        @if(check_node('book_del'))
                                        <a href="javascript:void(0);" id="del21" onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('res.asp?act=del&amp;id=21','del21');}">
                                            <span class="icon"><em>ź</em></span>
                                        </a>
                                        @else
                                        <span>-</span>
                                        @endif
                                    @else
                                        <span class="icon"><i>ŝ</i></span>
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
                            <td colspan="21">&nbsp;&nbsp;记录:<i>{{ $count }}</i>条</td>
                        </tr>
                    @endif
                        
                      

                   <!--  <tr class="t1">
                        <td colspan="21">
                            <center>记录:21 分页: <b>1</b> | <a href="javascript:void(0);" url="/res.asp?p=2&amp;m=res" onclick="fastH(this,'box')">2</a> | <a href="javascript:void(0);" url="/res.asp?p=2&amp;m=res" title="下一页" onclick="fastH(this,'box')">下一页</a> <a href="javascript:void(0);" url="/res.asp?p=2&amp;m=res" title="最后一页" onclick="fastH(this,'box')">尾页</a></center>
                        </td>
                    </tr> -->

                    </tbody>
                </table>
                <input name="this_url" id="this_url" value="/res.asp?m=res" type="hidden">
            </div>
        </div>
    </div>

