<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('全部');" url="stat_rep_turn.asp?to=m">患者报表</a></li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ő</span>患者报表</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun none" id="fun" style="display: none;">
            <div id="fun-n" class="right block"></div>
            <select class="select" onchange="To('stat_rep_turn.asp?s=1&amp;to='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                <option value="2017-6">2017年6月</option>
                <option value="2017-5">2017年5月</option>
            </select>
            <select class="select" onchange="To('stat_rep_turn.asp?s=1&amp;n='+this.options[this.selectedIndex].value+'&amp;to=m','main');">
                <option value="0" selected="selected">所有医生</option>
                <option value="1">刘主任</option>
                <option value="2">黄主任</option>
                <option value="3">陈主任</option>
                <option value="4">林主任</option>
                <option value="6">赵中献</option>
                <option value="7">黄小松</option>
                <option value="8">杨惠标</option>
                <option value="9">张家华</option>
                <option value="10">王奎</option>
                <option value="11">张建儒</option>
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
                            <center>到诊</center>
                        </th>
                        <th width="60">
                            <center>网络</center>
                        </th>
                        <th width="60">
                            <center>其它</center>
                        </th>
                        <th width="*">网约比</th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                    <tr class="t1">
                        <td>
                            <center><b><i>合 计</i></b></center>
                        </td>
                        <td>
                            <center><b><i>{{$sum}}</i></b></center>
                        </td>
                        <td>
                            <center><b><i>{{ $web }}</i></b></center>
                        </td>
                        <td>
                            <center><b><i>{{ $another }}</i></b></center>
                        </td>
                        <td>
                            <div class="perws">
                                <div class="perw" style="width:{{ ceil($web/$sum*100) }}%" title="{{ ceil($web/$sum*100) }}%">{{ ceil($web/$sum*100) }}%</div>
                            </div>
                        </td>
                    </tr>
                    @foreach($data as $key=>$item)
                    @if(is_int($loop->index/2))
                    <tr class="t2">
                    @else
					<tr class="t1">
                    @endif
                        <td>
                            <center><i>{{ $key }}</i></center>
                        </td>
                        <td>
                            <center>
       
                            <a href="javascript:void(0);" onclick="msgbox(this,800);" url="turn.asp?m=stat&amp;mo=dateline&amp;ds=2017-06-02">{{ $item_sum[$key] }}</a>
                          
                            </center>
                        </td>
                        <td>
                            <center>
                            @if($item['web'])
                            <a href="javascript:void(0);" onclick="msgbox(this,800);" url="turn.asp?m=stat&amp;mo=dateline&amp;o=ads&amp;aid=1&amp;ds=2017-06-02">{{ count($item['web']) }}</a>
                            @else
								<em>0</em>
                            @endif
                            </center>
                        </td>
                        <td>
                            <center>                          
                            @if($item['another'])
                            <a href="javascript:void(0);" onclick="msgbox(this,800);" url="turn.asp?m=stat&amp;mo=dateline&amp;o=ads&amp;aid=1&amp;ds=2017-06-02">{{ count($item['another']) }}</a>
                            @else
								<em>0</em>
                            @endif
                            </center>
                        </td>
                        <td>
                            <div class="perws">
                            @if(count($item['web']) == '0')
                                <div class="perw" style="width:10.0%；background-color:#999;" title="0%">0%</div>
                            @else
                                <div class="perw" style="width:{{ ceil(count($item['web'])/(count($item['web'])+count($item['another']))*100) }}%" title="{{ ceil(count($item['web'])/(count($item['web'])+count($item['another']))*100) }}%">{{ ceil(count($item['web'])/(count($item['web'])+count($item['another']))*100) }}%</div>
                            @endif   
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/stat_rep_turn.asp?to=m">
        </div>
    </div>
</div>
