<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('全部');" url="stat_turn.asp?to=m">患者统计</a></li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ŏ</span>患者统计</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun none" id="fun">
            <div id="fun-n" class="right block">
                <form name="form_date" id="form_date" onsubmit="return(fastK(this,'ds'));" action="stat_turn.asp?m=">
                    <input name="ds" id="ds" class="inp" type="text" value="" onfocus="WdatePicker({onpicked:function(){de.focus();},maxDate:'#F{$dp.$D(\'de\')||\'%y-%M-%d\'}'})"><i class="calendar icon">ğ</i>
                    <input name="de" id="de" class="inp" value="" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'ds\')}',maxDate:'%y-%M-%d'})">
                    <button type="submit" class="search"><span class="icon">ĺ</span></button>
                </form>
            </div>
            <select class="select" onchange="To('stat_turn.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                <option value="2017-6">2017年6月</option>
                <option value="2017-5">2017年5月</option>
            </select>
        </div>
        <div id="box" class="box">
            <div id="tab">
                <ul>
                    <li onclick="fastT(0,4,0,&quot;m&quot;,0,0,0)" class="now">按录入</li>
                    <li onclick="fastT(1,4,1,&quot;m&quot;,0,0,0)">按时段</li>
                    <li onclick="fastT(2,4,2,&quot;m&quot;,0,0,0)">按日期</li>
                    <li onclick="fastT(3,4,3,&quot;m&quot;,0,0,0)">按星期</li>
                    <li onclick="fastT(4,4,4,&quot;m&quot;,0,0,0)">按月份</li>
                    <li onclick="fastT(5,4,5,&quot;m&quot;,0,0,0)">按病种</li>
                    <li onclick="fastT(6,4,6,&quot;m&quot;,0,0,0)">按医生</li>
                    <li onclick="fastT(7,4,7,&quot;m&quot;,0,0,0)">按地区</li>
                    <li onclick="fastT(8,4,8,&quot;m&quot;,0,0,0)">按途径</li>
                    <li onclick="fastT(9,4,9,&quot;m&quot;,0,0,0)">按媒介</li>
                    <li onclick="fastT(10,4,10,&quot;m&quot;,0,0,0)">按年龄</li>
                    <li onclick="fastT(11,4,11,&quot;m&quot;,0,0,0)">按性别</li>
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
                                <center>就诊人数</center>
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
                                <center><b><i>3</i></b></center>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <center><a href="javascript:void(0);" onclick="fastC(this,'uid1');" url="stat_turn.asp?act=stat_s_uid&amp;aid=1&amp;to=m"><i>医患通</i> </a><a href="javascript:void(0);" onclick="msgbox(this,850);" url="turn.asp?m=stat&amp;o=uid&amp;aid=1&amp;to=m" title="医患通详细列表">[详]</a></center>
                            </td>
                            <td>
                                <center>2</center>
                            </td>
                            <td>
                                <div class="perws">
                                    <div class="perw" style="width:66.7%" title="67%">67%</div>
                                </div>
                            </td>
                        </tr>
                        <tr id="_infouid1" style="display:none;" class="t1">
                            <td colspan="3" id="infouid1"></td>
                        </tr>
                        <tr class="t1">
                            <td>
                                <center><a href="javascript:void(0);" onclick="fastC(this,'uid4');" url="stat_turn.asp?act=stat_s_uid&amp;aid=4&amp;to=m"><i>一株</i> </a><a href="javascript:void(0);" onclick="msgbox(this,850);" url="turn.asp?m=stat&amp;o=uid&amp;aid=4&amp;to=m" title="一株详细列表">[详]</a></center>
                            </td>
                            <td>
                                <center>1</center>
                            </td>
                            <td>
                                <div class="perws">
                                    <div class="perw" style="width:33.3%" title="33%">33%</div>
                                </div>
                            </td>
                        </tr>
                        <tr id="_infouid4" style="display:none;" class="t1">
                            <td colspan="3" id="infouid4"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="this_url" id="this_url" value="/stat_turn.asp?to=m">
        </div>
    </div>
</div>
