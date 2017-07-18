<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('全部');" url="stat_rep_dia.asp?to=m">对话报表</a></li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ő</span>对话报表</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun none" id="fun" style="display: block;">
            <div id="fun-n" class="right block"></div>
            <select class="select" onchange="To('stat_rep_dia.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                <option value="2017-5">2017年5月</option>
            </select>
            <select class="select" onchange="To('stat_rep_dia.asp?s=1&amp;n='+this.options[this.selectedIndex].value+'&amp;to=m','main');">
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
                            <center>项 目 名 称</center>
                        </th>
                        <th width="38">
                            <center>对话</center>
                        </th>
                        <th width="38">
                            <center>预约</center>
                        </th>
                        <th width="38">
                            <center>到诊</center>
                        </th>
                        <th width="*" colspan="3">
                            <center>PC商务通</center>
                        </th>
                        <th width="*" colspan="3">
                            <center>手机商务通</center>
                        </th>
                        <th width="*" colspan="3">
                            <center>网站电话</center>
                        </th>
                        <th width="*" colspan="3">
                            <center>糯米电话</center>
                        </th>
                        <th width="*" colspan="3">
                            <center>微信</center>
                        </th>
                        <th width="*" colspan="3">
                            <center>抓取电话</center>
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
                            <center><b><i>169</i></b></center>
                        </td>
                        <td>
                            <center><b><i>0</i></b></center>
                        </td>
                        <td>
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>26</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>26</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>26</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>26</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>26</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>39</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>0</i></b></center>
                        </td>
                        <td><b><i>蓝色：预约率 红色：到诊比</i></b></td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center><i>2017-06-01</i></center>
                        </td>
                        <td>
                            <center>13</center>
                        </td>
                        <td>
                            <center>0</center>
                        </td>
                        <td>
                            <center>0</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>13</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td>
                            <div class="pers">
                                <div class="per" style="width:10%;background-color:#999;" title="0%"><span>0%</span></div>
                            </div>
                            <div class="perts">
                                <div class="pert" style="width:10%" title="0%"><span class="persize">0%</span></div>
                            </div>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center><i>2017-06-05</i></center>
                        </td>
                        <td>
                            <center>156</center>
                        </td>
                        <td>
                            <center>0</center>
                        </td>
                        <td>
                            <center>0</center>
                        </td>
                        <td width="20">
                            <center>26</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>26</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>26</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>26</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>26</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>26</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td>
                            <div class="pers">
                                <div class="per" style="width:10%;background-color:#999;" title="0%"><span>0%</span></div>
                            </div>
                            <div class="perts">
                                <div class="pert" style="width:10%" title="0%"><span class="persize">0%</span></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/stat_rep_dia.asp?to=m">
        </div>
    </div>
</div>
