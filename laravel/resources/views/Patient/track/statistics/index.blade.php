<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        {!! guideHtml('消费记录', route('trackStatistics')) !!}
        {!! guideHtml('列表') !!}
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ľ</span>消费统计</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun none" id="fun">
            <div id="fun-n" class="right block">
                <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="stat_take.asp?m=">
                    <input name="ds" id="ds" class="inp" type="text" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i class="calendar icon">ğ</i>
                    <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                    <button type="submit" class="search"><span class="icon">ĺ</span></button>
                </form>
            </div>
            <select class="select" id="sta_date" onchange="To('stat_take.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                <option value="2017-6">2017年6月</option>
                <option value="2017-5">2017年5月</option>
            </select>
        </div>
        <div id="box" class="box">
            <div id="tab">
                <ul>
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'save']) }}','0')" class="now">按录入</li>
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'time']) }}','1')">按时段</li>
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'day']) }}','2')">按日期</li>
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'week']) }}','3')">按星期</li>
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'month']) }}','4')">按月份</li>
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'dis']) }}','5')">按病种</li>
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'doc']) }}','6')">按医生</li>
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'area']) }}','7')">按地区</li>
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'way']) }}','8')">按途径</li>
                    <!-- <li onclick="fastT('{{ route('trackStatistics',['way'=>'ads']) }}','9')">按媒介</li> -->
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'age']) }}','9')">按年龄</li>
                    <li onclick="fastT('{{ route('trackStatistics',['way'=>'gender']) }}','10')">按性别</li>
                </ul>
            </div>
            <div id="tablist">
                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="160">
                                <center>项目名称</center>
                            </th>
                            <th width="30">
                                <center>到诊</center>
                            </th>
                            <th width="30">
                                <center>检查</center>
                            </th>
                            <th width="35">
                                <center>消费</center>
                            </th>
                            <th width="50">
                                <center>人均</center>
                            </th>
                            <th width="30">
                                <center>就诊</center>
                            </th>
                            <th width="60">
                                <center>就诊率</center>
                            </th>
                            <th width="65">
                                <center>消费</center>
                            </th>
                            <th width="60">
                                <center>就诊人均</center>
                            </th>
                            <th width="60">
                                <center>到诊人均</center>
                            </th>
                            <th width="30">
                                <center>复诊</center>
                            </th>
                            <th width="60">
                                <center>复诊率</center>
                            </th>
                            <th width="65">
                                <center>消费</center>
                            </th>
                            <th width="60">
                                <center>复诊人均</center>
                            </th>

                            <th width="75">
                                <center>总消费</center>
                            </th>
                            <th width="60">
                                <center>到诊人均</center>
                            </th>
                            <th width="60">
                                <center>就诊人均</center>
                            </th>

                            <th width="*"></th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td>
                                <center><b><i>合 计</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['patient_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>0</i></b></center>
                            </td>
                            <td>
                                <center><b><i>0</i></b></center>
                            </td>
                            <td>
                                <center><b><i>0</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['treatment_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>
            {{ $total['patient_sum'] == '0' ? '0' :  ceil($total['treatment_sum'] / $total['patient_sum']*100) }}%
                            </i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['treatment_cost_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>
            {{ $total['treatment_sum'] == '0' ? '0' :  ceil($total['treatment_cost_sum'] / $total['treatment_sum']) }}
                            </i></b></center>
                            </td>
                            <td>
                                <center><b><i>
            {{ $total['patient_sum'] == '0' ? '0' :   ceil($total['treatment_cost_sum'] / $total['patient_sum']) }}
                                </i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['re_treatment_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>
         {{  $total['treatment_sum'] == '0' ? '0' :  ceil($total['re_treatment_sum'] / $total['treatment_sum']*100) }}%
                                </i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['re_treatment_takes_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>
    {{ $total['re_treatment_sum'] == '0' ? '0' : ceil($total['re_treatment_takes_sum'] / $total['re_treatment_sum']) }}
                                </i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['take_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>
                {{ $total['patient_sum'] == '0' ? '0' : ceil($total['take_sum'] / $total['patient_sum']) }}
                                </i></b></center>
                            </td>
                            <td>
                                <center><b><i>
         {{ $total['treatment_sum'] == '0' ? '0' :  ceil($total['take_sum'] / $total['treatment_sum']) }}
                                </i></b></center>
                            </td>
                            <td></td>
                        </tr>
                        @foreach($data as $field=> $item)
                        <tr class="t2">
                            <td>
                                <center><i>{{ $field }}</i> <a href="javascript:void(0);" onclick="msgbox(this,800);" url="turn.asp?m=stat&amp;o=uid&amp;aid=1&amp;to=m" title="医患通详细列表">[详]</a></center>
                            </td>
                            <td>
                                <center>{{ $item['patient_sum'] }}</center>
                            </td>
                            <td>
                                <center><i>0</i></center>
                            </td>
                            <td>
                                <center>0</center>
                            </td>
                            <td>
                                <center>0</center>
                            </td>
                            <td>
                                <center><i>{{ $item['treatment_sum'] }}</i></center>
                            </td>
                            <td>
                                <center>
                                {{ $item['patient_sum'] == '0' ? '0' : ceil($item['treatment_sum']/$item['patient_sum']*100) }}%
                                </center>
                            </td>
                            <td>
                                <center>{{ $item['treatment_takes_sum'] - $item['re_treatment_takes_sum'] }}</center>
                            </td>
                            <td>
                                <center>
                         {{$item['treatment_sum'] == '0' ? '0' : ceil(($item['treatment_takes_sum'] - $item['re_treatment_takes_sum'])/$item['treatment_sum']) }}
                                </center>
                            </td>
                            <td>
                                <center>
                        {{$item['patient_sum'] == '0' ? '0' : ceil(($item['treatment_takes_sum'] - $item['re_treatment_takes_sum'])/$item['patient_sum']) }}
                                </center>
                            </td>
                            <td>
                                <center><i>{{ $item['re_treatment_sum'] }}</i></center>
                            </td>

                            <td>
                                <center>{{$item['treatment_sum'] == '0' ? '0' : ceil($item['re_treatment_sum']/$item['treatment_sum']*100) }}%</center>
                            </td>
                            <td>
                                <center><i>{{ $item['re_treatment_takes_sum'] }}</i></center>
                            </td>
                            <td>
                                <center>{{$item['re_treatment_sum'] == '0' ? '0' :  ceil($item['re_treatment_takes_sum']/$item['re_treatment_sum']) }}</center>
                            </td>
                            <td>
                                <center><i>{{ $item['treatment_takes_sum'] }}</i></center>
                            </td>
                            <td>
                                <center>{{ $item['patient_sum'] == '0' ? '0' : ceil($item['treatment_takes_sum']/$item['patient_sum']) }}</center>
                            </td>
                            <td>
                                <center>{{ $item['treatment_sum'] == '0' ? '0' :  ceil($item['treatment_takes_sum']/$item['treatment_sum']) }}</center>
                            </td>

                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="this_url" id="this_url" value="/stat_take.asp?to=m">
        </div>
    </div>
</div>
