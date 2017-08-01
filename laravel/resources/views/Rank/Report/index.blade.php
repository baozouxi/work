<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('全部');" url="stat_rep_rank.asp?to=m">竞价报表</a></li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ő</span>竞价报表</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun none" id="fun">
            <div id="fun-n" class="right block"></div>
            <select class="select" onchange="To('/rank/report/searchByMonth?month='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                @foreach($months as $month)
                <option value="{{ $month->rank_date }}">{{ $month->rank_date }}月</option>
                @endforeach
            </select>
            <select class="select" onchange="To('/rank/report/searchByMonth?admin_id='+this.options[this.selectedIndex].value,'main');">
                <option value="0" selected="selected">全部来源</option>
                @foreach($rank_ways as $way)
                <option value="{{ $way->id }}">{{ $way->name }}</option>
                @endforeach
            </select>
        </div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="120">
                            <center>项 目 名 称</center>
                        </th>
                        <th width="65">
                            <center>消费</center>
                        </th>
                        <th width="65">
                            <center>展现</center>
                        </th>
                        <th width="*" colspan="3">
                            <center>点击</center>
                        </th>
                        <th width="*" colspan="3">
                            <center>对话</center>
                        </th>
                        <th width="*" colspan="3">
                            <center>预约</center>
                        </th>
                        <th width="*" colspan="3">
                            <center>到诊</center>
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
                        <td width="30">
                            <center><b><i>{{ $total['click'] }}</i></b></center>
                        </td>
                        <td width="50">
                            <center><b><i>{{ percent($total['click'], $total['show_times'], 'normal', '2') }}</i></b></center>
                        </td>
                        <td width="50">
                            <center><b><i>{{ divide($total['cost'], $total['click']) }}</i></b></center>
                        </td>
                        <td width="30">
                            <center><b><i>{{ $total['dialogs'] }}</i></b></center>
                        </td>
                        <td width="50">
                            <center><b><i>{{ percent($total['dialogs'], $total['click'], 'normal', '2') }}</i></b></center>
                        </td>
                        <td width="50">
                            <center><b><i>{{ divide($total['cost'], $total['dialogs']) }}</i></b></center>
                        </td>
                        <td width="30">
                            <center><b><i>{{ $total['book_count'] }}</i></b></center>
                        </td>
                        <td width="50">
                            <center><b><i>{{ percent($total['book_count'], $total['dialogs'], 'normal', '2') }}</i></b></center>
                        </td>
                        <td width="50">
                            <center><b><i>{{ divide($total['cost'], $total['book_count']) }}</i></b></center>
                        </td>
                        <td width="30">
                            <center><b><i>{{ $total['arrive'] }}</i></b></center>
                        </td>
                        <td width="50">
                            <center><b><i>{{ percent($total['arrive'], $total['book_count'], 'normal', '2') }}</i></b></center>
                        </td>
                        <td width="50">
                            <center><b><i>{{ divide($total['cost'],$total['arrive']) }}</i></b></center>
                        </td>
                        <td><b><i>蓝色：消费比例 红色：对话比例</i></b></td>
                    </tr>
                    @foreach($records as $record)
                    <tr class="t2">
                        <td>
                            <center><i>{{ $record['rank_date'] }}</i></center>
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
                            <center>{{ $record['dialogs'] }}</center>
                        </td>
                        <td>
                            <center>{{ percent($record['dialogs'], $record['click'], 'normal', '2') }}</center>
                        </td>
                        <td>
                            <center>{{ divide($record['cost'], $record['dialogs']) }}</center>
                        </td>
                        <td>
                            <center>{{ $record['book_count'] }}</center>
                        </td>
                        <td>
                            <center>{{ percent($record['book_count'], $record['dialogs'], 'normal', '2') }}</center>
                        </td>
                        <td>
                            <center>{{ divide($record['cost'], $record['book_count']) }}</center>
                        </td>
                        <td>
                            <center>{{ $record['arrive'] }}</center>
                        </td>
                        <td>
                            <center>{{ percent($record['arrive'], $record['book_count'], 'normal', '2') }}</center>
                        </td>
                        <td>
                            <center>{{ divide($record['cost'], $record['arrive']) }}</center>
                        </td>
                        <td>
                            <div class="pers">
                                <div class="per" style="min-width:10%;width: {{ percent($record['cost'], $total['cost'],'normal', '2')  }};" title="{{ percent($record['cost'], $total['cost'],'normal', '2')  }}"><span>{{ percent($record['cost'], $total['cost'],'normal', '2')  }}</span></div>
                            </div>
                            <div class="perts">
                                <div class="pert" style="min-width:10%;width:{{ percent($record['dialogs'], $total['dialogs'],'normal', '2')  }};" title="{{ percent($record['dialogs'], $total['dialogs'],'normal', '2')  }}"><span class="persize">{{ percent($record['dialogs'], $total['dialogs'],'normal', '2')  }}</span></div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/stat_rep_rank.asp?to=m">
        </div>
    </div>
</div>
