<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>修改资料</li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="user.asp?act=power&amp;s=1" class="sms"><span class="icon">Ķ</span>我的权限</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ń</span>修改资料</h3></div>
        <div id="box" class="box">
            <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('user.update', ['id'=>$user->id]) }}');">
                <label class="inline">姓名</label>
                {{ csrf_field() }}
                <input type="text" name="name" id="name" class="input" value="{{ $user->name }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" readonly="true"><span></span>
                <script>
                $('name').setAttribute('readOnly', true);
                </script>
                <label class="inline">登录名<span>仅限英文数字2-9字符</span></label>
                <input type="text" name="username" id="username" class="input" value="{{ $user->username }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><span></span>
                <script>
                $('nick').onblur = function() {
                    check('user.asp', 'nick', 4);
                    this.style.backgroundColor = '#fff';
                }
                </script>
                <label class="inline">手机号</label>
                <input type="text" name="tel" id="tel" class="input" value="{{ $user->tel }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><span></span>
                <script>
                check_phone();
                $('phone').onblur = function() {
                    check('user.asp', 'phone', 4);
                    check_phone();
                    this.style.backgroundColor = '#fff';
                }
                </script>
                <label class="inline">QQ号码<span>接收系统消息推送</span></label>
                <input type="text" name="qq" id="qq" class="input" value="{{ $user->qq }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';"><span></span>
                <label class="inline">微信号<span></span></label>
                <input type="text" name="weixin" id="weixin" class="input" value="{{ $user->tel }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';"><span></span>
                <label class="inline">旧密码<span>你原来的密码</span></label>
                <input type="password" name="oldpass" id="oldpass" class="input" value="" style="width:195px;" autocomplete="off" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <label class="inline">新密码<span>密码为8-16位字符</span></label>
                <input type="password" name="password" id="password" class="input" value="" style="width:195px;" autocomplete="off" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <input type="hidden" name="_method" value="PUT">
                <label class="inline"></label>
                <div name="msg" id="msg" style="width:182px;" class="msg">请稍后..</div>
                <label class="inline"></label>
                <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
            </form>
            <input type="hidden" name="this_url" id="this_url" value="/user.asp?act=pass">
        </div>
    </div>
</div>
