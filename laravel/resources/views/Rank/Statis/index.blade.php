<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('全部');" url="stat_rank.asp?to=m">竞价统计</a></li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ŏ</span>竞价统计</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun none" id="fun">
            <div id="fun-n" class="right block">
                <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="stat_rank.asp?m=">
                    <input name="ds" id="ds" class="inp" type="text" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i class="calendar icon">ğ</i>
                    <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                    <button type="submit" class="search"><span class="icon">ĺ</span></button>
                </form>
            </div>
            <select class="select" onchange="To('/rank/statistics/searchByMonth?month='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                @foreach($months as $month)
                <option value="{{ $month->rank_date }}">{{ $month->rank_date }}月</option>
                @endforeach
            </select>
        </div>
        <div id="box" class="box">
            <div id="tab">
                <ul>
                    <li onclick="fastT(0,7,0,&quot;0&quot;,0,0,0)" class="now">按录入</li>
                    <li onclick="fastT(1,7,2,&quot;0&quot;,0,0,0)">按日期</li>
                    <li onclick="fastT(2,7,3,&quot;0&quot;,0,0,0)">按星期</li>
                    <li onclick="fastT(3,7,4,&quot;0&quot;,0,0,0)">按月份</li>
                    <li onclick="fastT(4,7,12,&quot;0&quot;,0,0,0)">按分类</li>
                </ul>
            </div>
            <div id="tablist">
                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="150">
                                <center>项 目 名 称</center>
                            </th>
                            <th width="65">
                                <center>消费</center>
                            </th>
                            <th width="65">
                                <center>展现</center>
                            </th>
                            <th width="55">
                                <center>点击</center>
                            </th>
                            <th width="55">
                                <center>点击率</center>
                            </th>
                            <th width="55">
                                <center>点击成本</center>
                            </th>
                            <th width="*">占有率</th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td>
                                <center><b><i>合 计</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['cost'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['show_times'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['click'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ percent($total['click'], $total['show_times'], 'normal', '2') }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['cost'], $total['click']) }}</i></b></center>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                        @foreach($data_arr as $field => $record)
                        <tr class="t2">
                            <td>
                                <center><i>{{ $field }}</i></center>
                            </td>
                            <td>
                                <center>{{ $record['cost'] }}</center>
                            </td>
                            <td>
                                <center>{{ $record['show_times'] }}</center>
                            </td>
                            <td>
                                <center>{{ $record['click'] }}</center>
                            </td>
                            <td>
                                <center>{{ percent($record['click'], $record['show_times'], 'normal', '2') }}</center>
                            </td>
                            <td>
                                <center>{{ divide($record['cost'], $record['click']) }}</center>
                            </td>
                            <td>
                                <div class="perws">
                                    <div class="perw" style="min-width:10%;width:{{ percent($record['cost'], $total['cost'],'normal', '2')  }}" title="{{ percent($record['cost'], $total['cost'],'normal', '2')  }}">{{ percent($record['cost'], $total['cost'],'normal', '2')  }}</div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="this_url" id="this_url" value="/stat_rank.asp?to=m">
        </div>
    </div>
</div>
