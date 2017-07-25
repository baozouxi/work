<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('全部');" url="stat_take.asp?to=m">消费统计</a></li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ľ</span>消费统计</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun block" id="fun">
            <div id="fun-n" class="right block">
                <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="stat_take.asp?m=">
                    <input name="ds" id="ds" class="inp" type="text" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i class="calendar icon">ğ</i>
                    <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                    <button type="submit" class="search"><span class="icon">ĺ</span></button>
                </form>
            </div>
            <select class="select" onchange="To('/take/statistics/searchByMonth?month='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                @foreach($months as $month)
                @if($month->add_time == $current_month)
                    <option value="{{ $month->add_time }}" selected="selected">{{ $month->add_time }}月</option>
                @else
                    <option value="{{ $month->add_time }}" >{{ $month->add_time }}月</option>
                @endif
                @endforeach
            </select>
        </div>
        <div id="box" class="box">
            <div id="tab">
                <ul>
                    <li onclick="fastT(0,4,0,'{{ $current_month }}',0,0,0)" class="now">按录入</li>
                    <li onclick="fastT(1,4,1,'{{ $current_month }}',0,0,0)">按时段</li>
                    <li onclick="fastT(2,4,2,'{{ $current_month }}',0,0,0)">按日期</li>
                    <li onclick="fastT(3,4,3,'{{ $current_month }}',0,0,0)">按星期</li>
                    <li onclick="fastT(4,4,4,'{{ $current_month }}',0,0,0)">按月份</li>
                    <li onclick="fastT(5,4,5,'{{ $current_month }}',0,0,0)">按病种</li>
                    <li onclick="fastT(6,4,6,'{{ $current_month }}',0,0,0)">按医生</li>
                    <li onclick="fastT(7,4,7,'{{ $current_month }}',0,0,0)">按地区</li>
                    <li onclick="fastT(8,4,11,'{{ $current_month }}',0,0,0)">按途径</li>
                    <!-- <li onclick="fastT(9,2,9,'{{ $current_month }}',0,0,0)">按媒介</li> -->
                    <li onclick="fastT(9,4,9,'{{ $current_month }}',0,0,0)">按年龄</li>
                    <li onclick="fastT(10,4,10,'{{ $current_month }}',0,0,0)">按性别</li>
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
                           <!--  <th width="30">
                                <center>人次</center>
                            </th>
                            <th width="60">
                                <center>人次人均</center>
                            </th> -->
                            <th width="75">
                                <center>总消费</center>
                            </th>
                            <th width="60">
                                <center>到诊人均</center>
                            </th>
                            <th width="60">
                                <center>就诊人均</center>
                            </th>
                            <!-- <th width="60">
                                <center>人次人均</center>
                            </th> -->
                            <th width="*"></th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td>
                                <center><b><i>合 计</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['all_patient_count'] }}</i></b></center> <!-- 到诊 -->
                            </td>
                            <td>
                                <center><b><i>0</i></b></center><!-- 检查 -->
                            </td>
                            <td>
                                <center><b><i>0</i></b></center><!-- 消费 -->
                            </td>
                            <td>
                                <center><b><i>0</i></b></center><!-- 人均 -->
                            </td>
                            <td>
                                <center><b><i>{{ $total['all_patient_cost_count'] }}</i></b></center><!-- 就诊 -->
                            </td>
                            <td>
                                <center>
                                    <b>
                              <i>{{ percent($total['all_patient_cost_count'], $total['all_patient_count'], 'ceil') }}</i>
                                    </b>
                                </center><!-- 就诊率 -->
                            </td>
                            <td>
                                <center><b><i>{{ $total['take_sum'] }}</i></b></center><!-- 消费 -->
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['take_sum'], $total['all_patient_cost_count']) }}</i></b></center><!-- 就诊人均 -->
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['take_sum'], $total['all_patient_count']) }}</i></b></center><!-- 到诊人均 -->
                            </td>
                            <td>
                                <center><b><i>{{ $total['all_reHospital_count'] }}</i></b></center><!-- 复诊 -->
                            </td>
                            <td>
                                <center>
                                    <b><i>{{ percent($total['all_reHospital_count'], $total['all_patient_count'],'ceil') }}</i></b>
                                </center>
                                <!-- 复诊率 -->
                            </td>
                            <td>
                                <center><b><i>{{$total['reHospital_take_sum']}}</i></b></center><!-- 复诊消费 -->
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['reHospital_take_sum'],$total['all_reHospital_count'])}}</i></b></center><!-- 复诊人均 -->
                            </td>
                          <!--   <td>
                                <center><b><i>0</i></b></center> 人次 
                            </td>
                            <td>
                                <center><b><i>0</i></b></center> 人次人均
                            </td> -->
                            <td>
                                <center><b><i>{{ $total['take_sum'] }}</i></b></center><!-- 总消费 -->
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['take_sum'], $total['all_patient_count']) }}</i></b></center><!-- 到诊人均 -->
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['take_sum'], $total['all_reHospital_count']) }}</i></b></center><!-- 就诊人均 -->
                            </td>
                            <!-- <td>
                                <center><b><i>17.33</i></b></center>
                            </td> -->
                            <td></td>
                        </tr>
                        @foreach($data as $field => $item)
                        @if(is_int($loop->index/2))
                            <tr class="t2">
                        @else
                            <tr class="t1">
                        @endif
                            <td>
                                <center><i>{{ $field }}</i> <a href="javascript:void(0);" onclick="msgbox(this,800);" url="turn.asp?m=stat&amp;o=uid&amp;aid=1&amp;to=m" title="医患通详细列表">[详]</a></center>
                            </td>
                            <td>
                                <center>{{ $item['patient_count'] }}</center> 
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
                                <center><i>{{ $item['patient_cost_count'] }}</i></center>
                            </td>
                            <td>
                                <center>{{ percent($item['patient_cost_count'], $item['patient_count'],'ceil') }}</center>
                            </td>
                            <td>
                                <center>{{ $item['take_sum'] }}</center>
                            </td>
                            <td>
                                <center>{{ divide($item['take_sum'], $item['patient_cost_count']) }}</center>
                            </td>
                            <td>
                                <center>{{ divide($item['take_sum'], $item['patient_count']) }}</center>
                            </td>
                            <td>
                                <center><i>{{ $item['reHospital_count'] }}</i></center>
                            </td>
                            <td>
                                <center>{{ percent($item['reHospital_count'], $item['patient_count'], 'ceil') }}</center>
                            </td>
                            <td>
                                <center>{{ $item['reHospital_take_sum'] }}</center>
                            </td>
                            <td>
                                <center>{{ divide($item['reHospital_take_sum'], $item['reHospital_count']) }}</center>
                            </td>
                            <td>
                                <center><i>{{ $item['take_sum'] }}</i></center>
                            </td>
                            <td>
                                <center>{{ divide($item['take_sum'], $item['patient_count']) }}</center>
                            </td>
                            <td>
                                <center><i>{{ divide($item['take_sum'], $item['patient_cost_count']) }}</i></center>
                            </td>
                          <!--   <td>
                                <center>0</center>
                            </td> -->
                            <!-- <td>
                                <center>0</center>
                            </td> -->
                            <!-- <td>
                                <center>0</center>
                            </td> -->
                            <td></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('takeStatistics') }}">
        </div>
    </div>
</div>
