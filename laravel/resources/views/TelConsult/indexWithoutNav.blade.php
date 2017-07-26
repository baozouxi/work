
    
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
      
