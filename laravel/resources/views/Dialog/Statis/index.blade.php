<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('全部');" url="stat_dia.asp?to=m">对话统计</a></li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ŏ</span>对话统计</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun block" id="fun">
            <div id="fun-n" class="right block">
                <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="stat_dia.asp?m=">
                    <input name="ds" id="ds" class="inp" type="text" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i class="calendar icon">ğ</i>
                    <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                    <button type="submit" class="search"><span class="icon">ĺ</span></button>
                </form>
            </div>
            <select class="select" onchange="To('/dialog/statis/searchByMonth?month='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                @foreach($months as $month)
                <option value="{{ $month->date }}">{{ $month->date }}月</option>
                @endforeach
            </select>
        </div>
        <div id="box" class="box">
            <div id="tab">
                <ul>
                    <li onclick="fastT(0,6,0,&quot;0&quot;,0,0,0)" class="now">按录入</li>
                    <li onclick="fastT(1,6,2,&quot;0&quot;,0,0,0)">按日期</li>
                    <li onclick="fastT(2,6,3,&quot;0&quot;,0,0,0)">按星期</li>
                    <li onclick="fastT(3,6,4,&quot;0&quot;,0,0,0)">按月份</li>
                    <li onclick="fastT(4,6,5,&quot;0&quot;,0,0,0)">按科室</li>
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
                                <center>对话</center>
                            </th>
                            <th width="65">
                                <center>预约</center>
                            </th>
                            <th width="55">
                                <center>到诊</center>
                            </th>
                            <th width="55">
                                <center>预约率</center>
                            </th>
                            <th width="55">
                                <center>到诊率</center>
                            </th>
                            <th width="55">
                                <center>转换率</center>
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
                                <center><b><i>{{ $total['all_count'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['book_count'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['arrive'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ percent($total['book_count'], $total['all_count'],'normal', '2') }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ percent($total['arrive'], $total['book_count'],'normal', '2') }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ percent($total['arrive'], $total['all_count'],'normal', '2') }}</i></b></center>
                            </td>
                            <td><b><i>蓝色：预约比例 红色：到诊比例</i></b></td>
                        </tr>

                        @foreach($dialogs as $field=>$dialog)
                        <tr class="t2">
                            <td>
                                <center><a href="javascript:void(0);" onclick="msgbox(this,500);" url="stat_dia.asp?act=stat_s_uid&amp;aid=4&amp;to=2017-6"><i>{{ $field }}</i></a></center>
                            </td>
                            <td>
                                <center>
                                    <center>{{ $dialog['all_count'] }}</center>
                                </center>
                            </td>
                            <td>
                                <center>{{ $dialog['book_count'] }}</center>
                            </td>
                            <td>
                                <center>{{ $dialog['arrive'] }}</center>
                            </td>
                            <td>
                                <center>{{ percent($dialog['book_count'], $dialog['all_count'],'normal', '2') }}</center>
                            </td>
                            <td>
                                <center>{{ percent($dialog['arrive'], $dialog['book_count'],'normal', '2') }}</center>
                            </td>
                            <td>
                                <center>{{ percent($dialog['arrive'], $dialog['all_count'],'normal', '2') }}</center>
                            </td>
                            <td>
                                <div class="pers">
                                    <div class="per" style="min-width:10%;width:{{ percent($dialog['book_count'], $total['book_count'],'ceil') }}" title="{{ percent($dialog['book_count'], $total['book_count'],'ceil') }}"><span>{{ percent($dialog['book_count'], $total['book_count'],'ceil') }}</span></div>
                                </div>
                                <div class="perts">
                                    <div class="pert" style="min-width:10%;width:{{ percent($dialog['arrive'], $total['arrive'],'ceil') }} " title="{{ percent($dialog['arrive'], $total['arrive'],'ceil') }}"><span class="persize">{{ percent($dialog['arrive'], $total['arrive'],'ceil') }}</span></div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="this_url" id="this_url" value="/stat_dia.asp?to=2017-6">
        </div>
    </div>
</div>
