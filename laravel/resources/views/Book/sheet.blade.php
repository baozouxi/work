<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        {!! guideHtml('预约报表', route('bookSheet')) !!}
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ő</span>预约报表</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun none" id="fun">
            <div id="fun-n" class="right block"></div>
            <select class="select" id='sheet_date' onchange="To('/patient/report/'+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                <option value="2017-6">2017年6月</option>
                <option value="2017-5">2017年5月</option>
            </select>
            <select class="select" onchange="To('stat_rep_res.asp?s=1&amp;n='+this.options[this.selectedIndex].value+'&amp;to=m','main');">
                <option value="0" selected="selected">所有用户</option>
                <option value="1">医患通</option>
                <option value="2">咨询</option>
            </select>
        </div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="100">
                            <center>日期</center>
                        </th>
                        <th width="60">
                            <center>预约</center>
                        </th>
                        <th width="60">
                            <center>到诊</center>
                        </th>
                        <th width="60">
                            <center>当日</center>
                        </th>
                        <th width="*">到诊率/当日比</th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                    <tr class="t1">
                        <td>
                            <center><b><i>合 计</i></b></center>
                        </td>
                        <td>
                            <center><b><i>{{ $total['app_sum'] }}</i></b></center>
                        </td>
                        <td>
                            <center><b><i>{{ $total['patient_sum'] }}</i></b></center>
                        </td>
                        <td>
                            <center><b><i>{{ $total['on_that_day'] }}</i></b></center>
                        </td>
                        <td>
                            @if($total['arrived'] != 0)
                            <div class="pers">
                                <div class="per" style="width:{{ $total['arrived'] }}%" title="{{ $total['arrived'] }}%"><span>{{ $total['arrived'] }}%</span></div>
                            </div>
                            @else
                            <div class="pers">
                                <div class="per" style="width:10.0%;background-color:#999;" title="0%"><span>0%</span></div>
                            </div>
                            @endif
                            <div class="perts">
                                <div class="pert" style="width:{{ $total['arrive_on_that_day'] == '0' ? '10' : $total['arrive_on_that_day'] }}%" title="{{ $total['arrive_on_that_day'] }}%"><span class="persize">{{ $total['arrive_on_that_day'] }}%</span></div>
                            </div>
                        </td>
                    </tr>
                 
                 @foreach($data_arr as $date => $item)
                 @if(is_int($loop->index /2))
                    <tr class="t2">
                 @else
                    <tr class="t1">
                 @endif
                        <td>
                            <center><i>{{ $date }}</i></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;mo=dateline&amp;ds=2017-06-02">{{ $item['app_sum'] }}</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;mo=todate&amp;ds=2017-06-02">{{ $item['patient_sum'] }}</a></center>
                        </td>
                        <td>
                            <center><i>{{ $item['on_that_day'] }}</i></center>
                        </td>
                        <td>
                            @if($item['arrived'] != 0)
                            <div class="pers">
                                <div class="per" style="width:{{ $item['arrived'] }}%" title="{{ $item['arrived'] }}%"><span>{{ $item['arrived'] }}%</span></div>
                            </div>
                            @else

                            <div class="pers">
                                <div class="per" style="width:10.0%;background-color:#999;" title="0%"><span>0%</span></div>
                            </div>
                            @endif

                            <div class="perts">
                                <div class="pert" style="width:{{ $item['arrive_on_that_day'] == '0' ? '10' : $item['arrive_on_that_day'] }}%" title="{{ $item['arrive_on_that_day'] }}%"><span class="persize">{{ $item['arrive_on_that_day'] }}%</span></div>
                            </div>
                        </td>
                    </tr>
               @endforeach
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/stat_rep_res.asp?to=m">
        </div>
    </div>
</div>
