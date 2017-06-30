<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>病种管理</li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="msgbox(this,550);" url="dis.asp?act=tpl" class="sms"><span class="icon">ė</span>短信模版</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ĉ</span>病种列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('disease.create') }}"><span class="icon">ŷ</span>新增病种</a></h3></div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="50">
                            <center>编号</center>
                        </th>
                        <th width="*">名称</th>
                        <th width="60">
                            <center>状态</center>
                        </th>
                        <th width="60">
                            <center>短信</center>
                        </th>
                        <th width="60">
                            <center>排序</center>
                        </th>
                        <th width="60">
                            <center>合并</center>
                        </th>
                        <th width="40">
                            <center>删</center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                @foreach($data as $key => $item)
             
                    <tr class="t1">

                        <td>
                            <center>{{ $key }}</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑大类" onclick="msgbox(this);" url="{{ route('disease.edit',['id'=>$key]) }}">{{ $item['top']['name'] }}</a></td>
                        <td>
                            <center><span id="state{{ $key }}" style="cursor:pointer;" onclick="fast('','state{{ $key }}');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=7"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('dis.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=7">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    
                    @foreach($item['child'] as $child)
                    @if(is_int($loop->index /2))
                        <tr class="t2">
                    @else
                         <tr class="t1">
                    @endif
                        <td>
                            <center>{{ $child['id'] }}</center>
                        </td>
                        <td>　　├ <a href="javascript:void(0);" title="编辑小类" onclick="msgbox(this);" url="{{ route('disease.edit', ['id'=>$child['id']]) }}">{{ $child['name'] }}</a></td>
                        <td>
                            <center><span id="state{{ $child['id'] }}" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=8','state{{ $child['id'] }}');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=8"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank8" style="cursor:pointer;" onclick="fastE('dis.asp','rank',8)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="dis.asp?act=move&amp;id=8">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=8"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    @endforeach

                    @endforeach

                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('disease.index') }}">
        </div>
    </div>
</div>
