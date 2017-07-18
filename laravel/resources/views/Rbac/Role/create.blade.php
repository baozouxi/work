<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        <li>用户组管理</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ŷ</span>新增用户组</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('role.index') }}" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
        </div>
        <div id="box" class="box">
            <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('role.store') }}');">
                <label class="inline">用户组名称/类型</label>
                <input type="text" name="name" id="name" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><span></span>

                {{ csrf_field() }}
                <label class="inline"></label>
                <table cellspacing="1" cellpadding="0">
                    <tbody id="tablebg">
                        <tr class="t1">
                               <td><center><i><em>导航权限</em></i></center></td>
                        </tr>
                        <tr class="t2">
                            <td>
                            @foreach($nav as $key => $navItem)
                                <input name="nav[]" id="nav{{$key}}" type="checkbox" value="{{ $navItem->id }}">
                                <label for="nav{{$key}}">{{ $navItem['name'] }}</label>
                            @endforeach
                            </td>

                        </tr>
                        

                        <tr class="t1">
                            <td><center><i><em>页面节点权限</em></i></center></td>
                        </tr>

                        @foreach($nodes as $name => $nItem)
                        <tr class="t1">
                            <td><i><b>{{ $name }}</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                            @foreach($nItem['child'] as $child)
                                <input name="manage[]" id="{{ $child['name'] }}" type="checkbox" value="{{ $child['name'] }}">
                                <label for="{{ $child['name'] }}">{{ $child['nickname'] }}</label>
                            @endforeach   
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <label class="inline"></label>
                <input type="hidden" name="back_url" id="back_url" value="{{ route('role.index') }}">
                <label class="inline"></label>
                <div name="msg" id="msg" style="width:370px;" class="msg">请稍后..</div>
                <label class="inline"></label>
                <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
            </form>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('role.create') }}">
        </div>
    </div>
</div>
