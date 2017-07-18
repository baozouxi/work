<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        {!! guideHtml('患者列表', route('patient.index')) !!}
        <li><span id="guide">消费记录</span></li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Đ</span>消费记录</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="turn.asp?s=1&amp;m=turn" class="config"><span class="icon">ĭ</span>返回</a></p>
        </div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('take.create',['patientId'=>$patient->id]) }}"><span class="icon">ŷ</span>新增消费</a></h3></div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="90">
                            <center>姓名</center>
                        </th>
                        <th width="45">
                            <center>性别</center>
                        </th>
                        <th width="45">
                            <center>年龄</center>
                        </th>
                        <th width="100">
                            <center>手机</center>
                        </th>
                        <th width="120">
                            <center>地区</center>
                        </th>
                        <th width="100">
                            <center>病种</center>
                        </th>
                        <th width="100">
                            <center>媒介</center>
                        </th>
                        <th width="90">
                            <center>就诊医生</center>
                        </th>
                        <th width="120">
                            <center>到诊时间</center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                    <tr class="t1">
                        <td>
                            <center>{{ $patient->name }}</center>
                        </td>
                        <td>
                            <center>{{ getGender($patient->gender) }}</center>
                        </td>
                        <td>
                            <center>{{ $patient->age }}</center>
                        </td>
                        <td>
                            <center>{{ $patient->phone }}</center>
                        </td>
                        <td>
                            <center>{{ $patient->city }}  {{ $patient->town }}</center>
                        </td>
                        <td>
                            <center>肾病综合征</center>
                        </td>
                        <td>
                            <center>电视广告</center>
                        </td>
                        <td>
                            <center>赵中献</center>
                        </td>
                        <td>
                            <center>{{ formatDate($patient->add_time) }}</center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td colspan="9">{{ $patient->content }}</td>
                    </tr>
                </tbody>
            </table>
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="120">
                            <center>时间</center>
                        </th>
                        <th width="70">
                            <center>医生</center>
                        </th>
                        <th width="70">
                            <center>药量</center>
                        </th>
                        <th width="70">
                            <center>检查</center>
                        </th>
                        <th width="70">
                            <center>药品</center>
                        </th>
                        <th width="70">
                            <center>治疗</center>
                        </th>
                        <th width="70">
                            <center>住院</center>
                        </th>
                        <th width="70">
                            <center>总额</center>
                        </th>
                        <th width="*">备注</th>
                        <th width="90">
                            <center>操作</center>
                        </th>
                        <th width="30">
                            <center>删</center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                    @if(count($takes) < 1)
                        <tr class="t1">
                            <td colspan="11">
                                <center>暂无数据</center>
                            </td>
                        </tr>
                    @else
                        @foreach($takes as $key => $item)
                           <tr class="t1">
                                <td>
                                    <center><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('take.edit', ['takeId'=>$item->id]) }}" title="记录编辑">{{ formatDate($item->add_time) }}</a></center>
                                </td>
                                <td>
                                    <center><i>赵中献</i></center>
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
                                    <center>{{ $item->check_cost + $item->drug_cost + $item->treatment_cost +$item->hospitalization_cost}}</center>
                                </td>
                                <td>{{ $item->content }}&nbsp;</td>
                                <td>
                                    <center>一株</center>
                                </td>
                                <td>
                                    <center><a href="javascript:void(0);" id="del3" style="color:red" onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('take.asp?act=del&amp;id=3','del3');}"><span class="icon"><em>ź</em></span></a></center>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/take.asp?aid=8&amp;m=turn">
        </div>
    </div>
</div>
