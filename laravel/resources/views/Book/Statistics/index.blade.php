<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('全部');" url="stat_res.asp">预约统计</a></li>
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
            <select class="select" onchange="To('stat_res.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                <option value="2017-6">2017年6月</option>
                <option value="2017-5">2017年5月</option>
            </select>
        </div>
        <div id="box" class="box">
            <div id="tab">
                <ul>
                    <li onclick="fastT(0,1,0,&quot;m&quot;,0,0,0)" class="now">按录入</li>
                    <li onclick="fastT(1,1,1,&quot;m&quot;,0,0,0)">按时段</li>
                    <li onclick="fastT(2,1,2,&quot;m&quot;,0,0,0)">按日期</li>
                    <li onclick="fastT(3,1,3,&quot;m&quot;,0,0,0)">按星期</li>
                    <li onclick="fastT(4,1,4,&quot;m&quot;,0,0,0)">按月份</li>
                    <li onclick="fastT(5,1,5,&quot;m&quot;,0,0,0)">按病种</li>
                    <li onclick="fastT(6,1,6,&quot;m&quot;,0,0,0)">按医生</li>
                    <li onclick="fastT(7,1,7,&quot;m&quot;,0,0,0)">按地区</li>
                    <li onclick="fastT(8,1,8,&quot;m&quot;,0,0,0)">按途径</li>
                    <li onclick="fastT(9,1,10,&quot;m&quot;,0,0,0)">按年龄</li>
                    <li onclick="fastT(10,1,11,&quot;m&quot;,0,0,0)">按性别</li>
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
                                <center><b><i>{{ $total['app_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['patient_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['un_arrive'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['arrive_per'] }}%</i></b></center>
                            </td>
                            <td><b><i>蓝色：预约比例 红色：到诊比例 咨询人次：{{ $total['consult_sum'] }}</i></b></td>
                        </tr>
                    @foreach($data as $field => $item)
                    @if(is_int($loop->index/2))
                        <tr class="t2">
                    @else
                        <tr class="t1">
                    @endif
                            <td>
                                <center><a href="javascript:void(0);" onclick="msgbox(this,500);" url="stat_res.asp?act=stat_s_uid&amp;aid=1&amp;to=m"><i>{{ $field }}</i> </a><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;o=uid&amp;aid=1&amp;to=m" title="医患通详细列表">[详]</a></center>
                            </td>
                            <td>
                                <center>{{ $item['app_sum'] }}</center>
                            </td>
                            <td>
                                <center>{{ $item['patient_sum'] }}</center>
                            </td>
                            <td>
                                <center>{{ $item['un_arrive'] }}</center>
                            </td>
                            <td>
                                <center>{{ $item['arrive'] }}</center>
                            </td>
                            <td>
                            
                                <div class="pers">
                                    <div class="per" style="width:100.0%" title="100%"><span>100%</span></div>
                                </div>
                                <div class="perts">
                                    <div class="pert" style="width:100.0%" title="100%"><span class="persize">100%</span></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="this_url" id="this_url" value="/stat_res.asp?to=m">
        </div>
    </div>
</div>
