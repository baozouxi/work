<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>用户组管理</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ɔ</span>权限节点列表</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('role.index') }}" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
        </div>

        <div class="fun">
            <h3 class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('node-group.create') }}">
                <span class="icon">ŷ</span>新增权限分组</a>
            </h3>
            <h3 style="margin-left:10px;" class="left"><a href="javascript:void(0);" onclick="msgbox(this);" url="{{ route('node.create') }}">
                <span class="icon">ŷ</span>新增权限节点</a>
            </h3>
        </div>
        <div id="box" class="box">

                <label style="margin-left:20px;" class="inline"></label style="margin-left:20px;">
                <table cellspacing="1" cellpadding="0">
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td><center><i><em>页面节点权限</em></i></center></td>
                        </tr>
                    
                    @foreach($data as $gName => $dItem)
                        <tr class="t1">
                            <td>
                            <i><b>{{ $gName  }}</b></i>
                            
                            <a class="right" href=""><span class="icon"><em>ź</em></span></a>
                       
                            </td>
                        </tr>
                        <tr class="t2">
                        
                            <td>
                             @foreach($dItem['child'] as $nodeItem)
                               <a href="" style="margin-left:20px;">{{ $nodeItem['nickname'] }}({{ strtoupper($nodeItem['name']) }})</a> 
                                <a href="javascript:void(0);" title="删除数据" onclick="msgbox(this);" url="dis.asp?act=del&amp;id=7"><span class="icon"><em>ź</em></span></a>
                            @endforeach
                            </td>
                  
                        </tr>
                    @endforeach

                    </tbody>
                </table>


         
            
        </div>
    </div>
</div>
