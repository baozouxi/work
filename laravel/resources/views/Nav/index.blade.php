<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>导航管理</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ĉ</span>导航列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('nav.create') }}"><span class="icon">ŷ</span>新增导航</a></h3></div>
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
                            <center>操作</center>
                        </th>
                        <th width="40">
                            <center>删</center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">

                
                @foreach($nav as $navItem)
                
                    <tr class="t1">
                        <td>
                            <center>{{ $navItem['id'] }}</center>
                        </td>
                        <td><i>{{ $navItem['name'] }}</i></td>
                        <td>
                            <center><span id="state1" style="cursor:pointer;" onclick="fast('','state1');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=7"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank{{ $navItem['id'] }}" style="cursor:pointer;" onclick="fastE('{{route('navSort', ['id'=>$navItem['id']]) }}','rank',{{ $navItem['id'] }})">{{ $navItem['sort'] }}</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="{{ route('nav.edit', ['id'=>$navItem['id']]) }}">修改</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    @foreach($navItem['nav_child'] as $nav_child)
                    <tr class="t2">
                        <td>
                            <center>{{ $nav_child['id'] }}</center>
                        </td>
                        <td> ├ <span>{{ $nav_child['name'] }}</span></td>
                        <td>
                            <center><span id="state2" style="cursor:pointer;" onclick="fast('dis.asp?act=state&amp;id=8','state2');">正常</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="模版设置" onclick="msgbox(this,550);" url="dis.asp?act=tpl&amp;id=8"><span>全局</span></a></center>
                        </td>
                        <td>
                            <center><span id="rank{{ $nav_child['id'] }}" style="cursor:pointer;" onclick="fastE('{{route('navSort', ['id'=>$nav_child['id']]) }}','rank',{{ $nav_child['id'] }})">{{ $nav_child['sort'] }}</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="{{ route('nav.edit', ['id'=>$nav_child['id']]) }}">修改</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url=""><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    @endforeach

                @endforeach

                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('nav.index') }}">
        </div>
    </div>
</div>
