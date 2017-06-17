<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');" url="take.asp">消费记录</a><span class="ider">&gt;</span></li>
        <li><span id="guide">列表</span></li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this);set_title('今日消费');" url="take.asp?n=1" class="sms"><span class="icon">ğ</span>今日消费</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Đ</span>消费列表</h3>
            <p class="nlink right"></p>
        </div>
        <div class="fun none" id="fun">
            <div id="fun-n" class="right"></div>
        </div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="120">
                            <center><a href="javascript:void(0);" url="take.asp?t=dateline&amp;go=desc" title="按时间排序" onclick="fastH(this)">时间</a></center>
                        </th>
                        <th width="80">
                            <center><a href="javascript:void(0);" url="take.asp?t=aid&amp;go=desc" title="按姓名排序" onclick="fastH(this)">姓名</a></center>
                        </th>
                        <th width="70">
                            <center><a href="javascript:void(0);" url="take.asp?t=cycle&amp;go=desc" title="按药量排序" onclick="fastH(this)">药量</a></center>
                        </th>
                        <th width="70">
                            <center><a href="javascript:void(0);" url="take.asp?t=find&amp;go=desc" title="按检查排序" onclick="fastH(this)">检查</a></center>
                        </th>
                        <th width="70">
                            <center><a href="javascript:void(0);" url="take.asp?t=drug&amp;go=desc" title="按药品排序" onclick="fastH(this)">药品</a></center>
                        </th>
                        <th width="70">
                            <center><a href="javascript:void(0);" url="take.asp?t=cure&amp;go=desc" title="按治疗排序" onclick="fastH(this)">治疗</a></center>
                        </th>
                        <th width="70">
                            <center><a href="javascript:void(0);" url="take.asp?t=hos&amp;go=desc" title="按住院排序" onclick="fastH(this)">住院</a></center>
                        </th>
                        <th width="70">
                            <center><a href="javascript:void(0);" url="take.asp?t=money&amp;go=desc" title="按总额排序" onclick="fastH(this)">总额</a></center>
                        </th>
                        <th width="*">备注</th>
                        <th width="70">
                            <center><a href="javascript:void(0);" url="take.asp?t=dep&amp;go=desc" title="按医生排序" onclick="fastH(this)">医生</a></center>
                        </th>
                        <th width="90">
                            <center><a href="javascript:void(0);" url="take.asp?t=uid&amp;go=desc" title="按操作员排序" onclick="fastH(this)">操作员</a></center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                @foreach($takes as $key => $item)
                    @if(is_int($key/2))
                        <tr class="t1">
                    @else
                        <tr class="t2">
                    @endif
                        <td>
                            <center>{{ formatDate($item->add_time) }}</center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="“{{$item->name}}”的消费记录" onclick="msgbox(this,850);" url="{{ route('take.show', ['patientId'=>$item->patientId]) }}"><i>{{ $item->name }}</i></a></center>
                        </td>
                        <td>
                            <center>{{ $item->dose }}</center>
                        </td>
                        <td>
                            <center>{{ $item->check_cost }}</center>
                        </td>
                        <td>
                            <center>{{ $item->drug_cost }}</center>
                        </td>
                        <td>
                            <center>{{ $item->treatment_cost }}</center>
                        </td>
                        <td>
                            <center>{{ $item->hospitalization_cost }}</center>
                        </td>
                        <td>
                            <center>{{ $item->check_cost+$item->drug_cost+$item->treatment_cost+$item->hospitalization_cost }}</center>
                        </td>
                        <td>sadasdasdas&nbsp;</td>
                        <td>
                            <center>赵中献</center>
                        </td>
                        <td>
                            <center>一株</center>
                        </td>
                    </tr>
                @endforeach
                    <tr class="t1">
                        <td colspan="11">&nbsp;&nbsp;记录:<i>4</i>条</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="this_url" id="this_url" value="/take.asp">
    </div>
</div>
