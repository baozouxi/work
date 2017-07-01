<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>途径管理</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ń</span>途径列表</h3></div>
        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('way.create') }}"><span class="icon">ŷ</span>新增途径</a></h3></div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="50">
                            <center>编号</center>
                        </th>
                        <th width="*">名称</th>
                        <th width="60">
                            <center>统计</center>
                        </th>
                        <th width="60">
                            <center>状态</center>
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
                    <tr class="t1">
                        <td>
                            <center>1</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=1">网站预约</a> <span>网站上预约调用分类</span></td>
                        <td>
                            <center><em>系统</em></center>
                        </td>
                        <td>
                            <center><em>系统</em></center>
                        </td>
                        <td>
                            <center><span id="rank1" style="cursor:pointer;" onclick="fastE('way.asp','rank',1)">0</span></center>
                        </td>
                        <td>
                            <center>合并</center>
                        </td>
                        <td>
                            <center>-</center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>6</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=6">PC商务通</a></td>
                        <td>
                            <center><span id="star6" style="cursor:pointer;" onclick="fast('way.asp?act=star&amp;id=6','star6');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="state6" style="cursor:pointer;" onclick="fast('way.asp?act=state&amp;id=6','state6');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank6" style="cursor:pointer;" onclick="fastE('way.asp','rank',6)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="way.asp?act=move&amp;id=6">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="way.asp?act=del&amp;id=6"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>7</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=7">手机商务通</a></td>
                        <td>
                            <center><span id="star7" style="cursor:pointer;" onclick="fast('way.asp?act=star&amp;id=7','star7');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="state7" style="cursor:pointer;" onclick="fast('way.asp?act=state&amp;id=7','state7');"><i>停用</i></span></center>
                        </td>
                        <td>
                            <center><span id="rank7" style="cursor:pointer;" onclick="fastE('way.asp','rank',7)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="way.asp?act=move&amp;id=7">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="way.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>8</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=8">网站电话</a></td>
                        <td>
                            <center><span id="star8" style="cursor:pointer;" onclick="fast('way.asp?act=star&amp;id=8','star8');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="state8" style="cursor:pointer;" onclick="fast('way.asp?act=state&amp;id=8','state8');"><i>停用</i></span></center>
                        </td>
                        <td>
                            <center><span id="rank8" style="cursor:pointer;" onclick="fastE('way.asp','rank',8)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="way.asp?act=move&amp;id=8">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="way.asp?act=del&amp;id=8"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>23</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=23">糯米电话</a></td>
                        <td>
                            <center><span id="star23" style="cursor:pointer;" onclick="fast('way.asp?act=star&amp;id=23','star23');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="state23" style="cursor:pointer;" onclick="fast('way.asp?act=state&amp;id=23','state23');"><i>停用</i></span></center>
                        </td>
                        <td>
                            <center><span id="rank23" style="cursor:pointer;" onclick="fastE('way.asp','rank',23)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="way.asp?act=move&amp;id=23">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="way.asp?act=del&amp;id=23"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>32</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=32">微信</a></td>
                        <td>
                            <center><span id="star32" style="cursor:pointer;" onclick="fast('way.asp?act=star&amp;id=32','star32');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="state32" style="cursor:pointer;" onclick="fast('way.asp?act=state&amp;id=32','state32');"><i>停用</i></span></center>
                        </td>
                        <td>
                            <center><span id="rank32" style="cursor:pointer;" onclick="fastE('way.asp','rank',32)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="way.asp?act=move&amp;id=32">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="way.asp?act=del&amp;id=32"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>33</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=33">抓取电话</a></td>
                        <td>
                            <center><span id="star33" style="cursor:pointer;" onclick="fast('way.asp?act=star&amp;id=33','star33');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="state33" style="cursor:pointer;" onclick="fast('way.asp?act=state&amp;id=33','state33');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="rank33" style="cursor:pointer;" onclick="fastE('way.asp','rank',33)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="way.asp?act=move&amp;id=33">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="way.asp?act=del&amp;id=33"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>34</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=34">asd</a></td>
                        <td>
                            <center><span id="star34" style="cursor:pointer;" onclick="fast('way.asp?act=star&amp;id=34','star34');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="state34" style="cursor:pointer;" onclick="fast('way.asp?act=state&amp;id=34','state34');"><i>停用</i></span></center>
                        </td>
                        <td>
                            <center><span id="rank34" style="cursor:pointer;" onclick="fastE('way.asp','rank',34)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="way.asp?act=move&amp;id=34">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="way.asp?act=del&amp;id=34"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t1">
                        <td>
                            <center>35</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=35">aasasd</a></td>
                        <td>
                            <center><span id="star35" style="cursor:pointer;" onclick="fast('way.asp?act=star&amp;id=35','star35');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="state35" style="cursor:pointer;" onclick="fast('way.asp?act=state&amp;id=35','state35');"><i>停用</i></span></center>
                        </td>
                        <td>
                            <center><span id="rank35" style="cursor:pointer;" onclick="fastE('way.asp','rank',35)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="way.asp?act=move&amp;id=35">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="way.asp?act=del&amp;id=35"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                    <tr class="t2">
                        <td>
                            <center>36</center>
                        </td>
                        <td><a href="javascript:void(0);" title="编辑名称" onclick="msgbox(this);" url="way.asp?act=add&amp;id=36">撒大师的啊</a></td>
                        <td>
                            <center><span id="star36" style="cursor:pointer;" onclick="fast('way.asp?act=star&amp;id=36','star36');">正常</span></center>
                        </td>
                        <td>
                            <center><span id="state36" style="cursor:pointer;" onclick="fast('way.asp?act=state&amp;id=36','state36');"><i>停用</i></span></center>
                        </td>
                        <td>
                            <center><span id="rank36" style="cursor:pointer;" onclick="fastE('way.asp','rank',36)">0</span></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="合并数据" onclick="msgbox(this);" url="way.asp?act=move&amp;id=36">合并</a></center>
                        </td>
                        <td>
                            <center><a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="way.asp?act=del&amp;id=36"><span class="icon"><em>ź</em></span></a></center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('way.index') }}">
        </div>
    </div>
</div>
