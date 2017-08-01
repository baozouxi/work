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
        <div class="fun block" id="fun" style="display: block;">
            <div id="fun-n" class="right block"></div>
            <select class="select" onchange="To('{{ route('dialogSheetSearchByMonth') }}?month='+this.options[this.selectedIndex].value+'','main');">
                <option value="0">按月查询</option>
                @foreach($months as $month)
                @if($month->date == $current_month)
                    <option value="{{ $month->date }}" selected="selected">{{ $month->date }}月</option>
                @else
                    <option value="{{ $month->date }}">{{ $month->date }}月</option>
                @endif
                @endforeach
            </select>
            <select class="select" onchange="To('{{ route('dialogSheetSearchByMonth') }}?month={{ $current_month }}&admin_id='+this.options[this.selectedIndex].value+'','main');">
                <option value="0" selected="selected">所有用户</option>
                @foreach($users as $user)
                @if($user->id == $admin_id)
                    <option value="{{ $user->id }}" selected="selected">{{ $user->name }}</option>
                @else
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
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
                        @foreach($ways as $way)
                        <th width="*" colspan="3">
                            <center>{{ $way['name'] }}</center>
                        </th>
                        @endforeach
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
                        @foreach($ways as $way)
                        <td width="20">
                            <center><b><i>{{ $total['data'][$way['id']] or '0' }}</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>&nbsp;</i></b></center>
                        </td>
                        <td width="20">
                            <center><b><i>&nbsp;</i></b></center>
                        </td>     
                        @endforeach             
                        <td><b><i>蓝色：预约率 红色：到诊比</i></b></td>
                    </tr>
                    
                    @foreach($dialogs as $dialog)

                    <tr class="t2">
                        <td>
                            <center><i>{{ $dialog['date'] }}</i></center>
                        </td>
                        <td>
                            <center>{{ $dialog['all_count'] }}</center>
                        </td>
                        <td>
                            <center>{{ $dialog['book_count'] }}</center>
                        </td>
                        <td>
                            <center>{{ $dialog['arrive'] }}</center>
                        </td>
                        @foreach($ways as $way)
                        <td width="20">
                            <center>{{ $dialog['data'][$way['id']] or '0' }}</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        <td width="20">
                            <center>&nbsp;</center>
                        </td>
                        @endforeach
                        <td>
                            <div class="pers">
                                <div class="per" style="min-width:10%;width:{{ percent($dialog['book_count'], $dialog['all_count'], 'ceil')  }};" title="{{ percent($dialog['book_count'], $dialog['all_count'], 'ceil')  }}">
                                <span>{{ percent($dialog['book_count'], $dialog['all_count'], 'ceil')  }}</span></div>
                            </div>
                            <div class="perts">
                                <div class="pert" style="min-width:10%;width:{{ percent($dialog['arrive'], $dialog['all_count'], 'ceil')  }};" title="{{ percent($dialog['arrive'], $dialog['all_count'], 'ceil')  }}"><span class="persize">{{ percent($dialog['arrive'], $dialog['all_count'], 'ceil')  }}</span></div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="/stat_rep_dia.asp?to=m">
        </div>
    </div>
</div>
