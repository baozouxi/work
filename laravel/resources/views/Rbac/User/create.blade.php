<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>用户管理</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ŷ</span>新增用户</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="user.asp?s=1" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
        </div>
        <div id="box" class="box">
            <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('user.store') }}');">
                <label class="inline">姓名</label>
                <input type="text" name="name" id="name" class="input" value="" style="width:140px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
                <label class="inline">昵称<span>登录使用名</span></label>
                <input type="text" name="username" id="username" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><span></span>
                <script>
                $('nick').onblur = function() {
                    check('user.asp', 'nick', 0);
                    this.style.backgroundColor = '#fff';
                }
                </script>
                {{ csrf_field() }}
                <label class="inline">手机号<span id="phone_city" style="color:#19A97B;"></span></label>
                <input type="text" name="tel" id="tel" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><span></span>
                <script>
                check_phone();
                $('phone').onblur = function() {
                    check('user.asp', 'phone', 0);
                    check_phone();
                    this.style.backgroundColor = '#fff';
                }
                </script>
                <label class="inline">QQ号</label>
                <input type="text" name="qq" id="qq" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';"><span></span>
                <label class="inline">微信号</label>
                <input type="text" name="weixin" id="weixin" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';"><span></span>
                <label class="inline">密码</label>
                <input type="password" name="password" id="password" class="input" value="" style="width:195px;" autocomplete="off" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <label class="inline">所属用户组</label>
                <select class="select" name="role_id" id="role_id" style="width:205px;">
                @foreach($role as $roleItem)
                    <option value="{{ $roleItem->id }}">{{ $roleItem->name }}</option>
                @endforeach
                </select>

                <label class="inline"></label>
                <input type="hidden" name="back_url" id="back_url" value="{{ route('user.index') }}">
                <label class="inline"></label>
                <div name="msg" id="msg" style="width:370px;" class="msg">请稍后..</div>
                <label class="inline"></label>
                <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
            </form>
            <input type="hidden" name="this_url" id="this_url" value="/user.asp?act=add">
        </div>
    </div>
</div>
