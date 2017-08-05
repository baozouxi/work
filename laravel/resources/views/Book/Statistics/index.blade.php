
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
            <select class="select" id="sta_date" onchange="To('/book/statistics/searchByMonth?month='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                @foreach($months as $month)
                <option value="{{ $month->postdate }}">{{ $month->postdate }}月</option>
                @endforeach
            </select>
        </div>
        <div id="box" class="box">
            <div id="tab">
               <ul>
                    <li onclick="fastT(0,3,0,&quot;m&quot;,0,0,0)" class="now">按录入</li>
                    <li onclick="fastT(1,3,1,&quot;m&quot;,0,0,0)">按时段</li>
                    <li onclick="fastT(2,3,2,&quot;m&quot;,0,0,0)">按日期</li>
                    <li onclick="fastT(3,3,3,&quot;m&quot;,0,0,0)">按星期</li>
                    <li onclick="fastT(4,3,4,&quot;m&quot;,0,0,0)">按月份</li>
                    <li onclick="fastT(5,3,5,&quot;m&quot;,0,0,0)">按病种</li>
                    <!-- <li onclick="fastT(6,3,6,&quot;m&quot;,0,0,0)">按医生</li> -->
                    <li onclick="fastT(6,3,7,&quot;m&quot;,0,0,0)">按地区</li>
                    <li onclick="fastT(7,3,8,&quot;m&quot;,0,0,0)">按途径</li>
                    <li onclick="fastT(8,3,9,&quot;m&quot;,0,0,0)">按年龄</li>
                    <li onclick="fastT(9,3,10,&quot;m&quot;,0,0,0)">按性别</li>
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
                        @foreach($data_arr as $field => $data)
                        <tr class="t2">
                            <td>
                                <center><a href="javascript:void(0);" onclick="msgbox(this,500);" url="stat_res.asp?act=stat_s_uid&amp;aid=1&amp;to=m"><i>{{ $field }}</i> </a><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;o=uid&amp;aid=1&amp;to=m" title="医患通详细列表">[详]</a></center>
                            </td>
                            <td>
                                <center>{{ $data['all_count'] }}</center>
                            </td>
                            <td>
                                <center>{{ $data['arrive'] }}</center>
                            </td>
                            <td>
                                <center>{{ $data['un_arrive'] }}</center>
                            </td>
                            <td>
                                <center>{{ percent($data['arrive'], $data['all_count'], 'ceil') }}</center>
                            </td>
                            <td>
                                <div class="pers">
                                    <div class="per" style="width:{{ percent($data['all_count'], $total['all_count'], 'ceil') }}" title="{{ percent($data['all_count'], $total['all_count'], 'ceil') }}"><span>{{ percent($data['all_count'], $total['all_count'], 'ceil') }}</span></div>
                                </div>
                                <div class="perts">
                                    <div class="pert" style="width:{{ percent($data['arrive'], $total['arrive'], 'ceil') }}" title="{{ percent($data['arrive'], $total['arrive'], 'ceil') }}"><span class="persize">{{ percent($data['arrive'], $total['arrive'], 'ceil') }}</span></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('bookStatistics') }}">
        </div>
    </div>
</div>
