<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('全部');" url="stat_rep_res.asp?to=m">预约报表</a></li>
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
            <select class="select" onchange="To('stat_rep_res.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'','main');">
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
                            <center><b><i>2</i></b></center>
                        </td>
                        <td>
                            <center><b><i>2</i></b></center>
                        </td>
                        <td>
                            <center><b><i>1</i></b></center>
                        </td>
                        <td>
                            <div class="pers">
                                <div class="per" style="width:100.0%" title="100%"><span>100%</span></div>
                            </div>
                            <div class="perts">
                                <div class="pert" style="width:50.0%" title="50%"><span class="persize">50%</span></div>
                            </div>
                        </td>
                    </tr>
                    @foreach($data as )
                    <tr class="t2">
                        <td>
                            <center><i>{{ $date }}</i></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;mo=dateline&amp;ds=2017-06-02">1</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;mo=todate&amp;ds=2017-06-02">2</a></center>
                        </td>
                        <td>
                            <center><i>1</i></center>
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
                    <tr class="t1">
                        <td>
                            <center><i>2017-06-08</i></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;mo=dateline&amp;ds=2017-06-08">1</a></center>
                        </td>
                        <td>
                            <center><em>0</em></center>
                        </td>
                        <td>
                            <center><em>0</em></center>
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
            <input type="hidden" name="this_url" id="this_url" value="/stat_rep_res.asp?to=m">
        </div>
    </div>
</div>
