

<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        {!! guideHtml('预约统计', route('bookStatistics')) !!}
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ŏ</span>预约统计</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun none" id="fun">
            <div id="fun-n" class="right block">
                <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="stat_res.asp?m=">
                    <input name="ds" id="ds" class="inp" type="text" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i class="calendar icon">ğ</i>
                    <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                    <button type="submit" class="search"><span class="icon">ĺ</span></button>
                </form>
            </div>
            <select class="select" id="sta_date" onchange="To('stat_res.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                <option value="2017-6">2017年6月</option>
                <option value="2017-5">2017年5月</option>
            </select>
        </div>
        <div id="box" class="box">
            <div id="tab">
                <ul>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'save']) }}','0')" class="now">按录入</li>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'time']) }}','1')">按时段</li>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'day']) }}','2')">按日期</li>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'week']) }}','3')">按星期</li>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'month']) }}','4')">按月份</li>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'disease']) }}','5')">按病种</li>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'res']) }}','6')">按医生</li>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'area']) }}','7')">按地区</li>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'way']) }}','8')">按途径</li>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'age']) }}','10')">按年龄</li>
                    <li onclick="fastT('{{ route('bookStatistics',['way'=>'gender']) }}','11')">按性别</li>
                </ul>
            </div>
            <div id="tablist">
                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="220">
                                <center>项 目 名 称</center>
                            </th>
                            <th width="70">
                                <center>预约人数</center>
                            </th>
                            <th width="70">
                                <center>到诊人数</center>
                            </th>
                            <th width="70">
                                <center>未到诊数</center>
                            </th>
                            <th width="70">
                                <center>到诊率</center>
                            </th>
                            <th width="*">占有率（预约/到诊）</th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td>
                                <center><b><i>合 计</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['all_count'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['arrive'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['un_arrive'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ percent($total['arrive'], $total['all_count']) }}</i></b></center>
                            </td>
                            <td><b><i>蓝色：预约比例 红色：到诊比例 咨询人次：</i></b></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <input type="hidden" name="this_url" id="this_url" value="/stat_res.asp?to=m">
        </div>
    </div>
</div>
