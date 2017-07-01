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
            <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('user.asp');">
                <label class="inline">姓名</label>
                <input type="text" name="name" id="name" class="input" value="" style="width:140px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
                <input name="state" id="state" class="checkbox" type="checkbox" value="1" checked="checked">
                <label for="state"><i>正常</i></label>
                <label class="inline">昵称<span>登录使用名</span></label>
                <input type="text" name="nick" id="nick" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><span></span>
                <script>
                $('nick').onblur = function() {
                    check('user.asp', 'nick', 0);
                    this.style.backgroundColor = '#fff';
                }
                </script>
                <label class="inline">手机号<span id="phone_city" style="color:#19A97B;"></span></label>
                <input type="text" name="phone" id="phone" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><span></span>
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
                <input type="password" name="pass" id="pass" class="input" value="" style="width:195px;" autocomplete="off" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <label class="inline">所属用户组</label>
                <select class="select" name="group" id="group" style="width:205px;">
                    <option value="2">咨询员</option>
                    <option value="3">竞价员</option>
                    <option value="4">程序员</option>
                    <option value="5">导医组</option>
                    <option value="6">医助</option>
                    <option value="7">医生</option>
                    <option value="8">财务</option>
                    <option value="9">院长</option>
                    <option value="10">咨询主管</option>
                    <option value="11">竞价主管</option>
                    <option value="12">网络主管</option>
                    <option value="13">经营主管</option>
                </select>
                <label class="inline">用户管理权限</label>
                <select class="select" name="power" id="power" multiple="multiple" style="width:205px;height:100px;">
                    <option value="0" selected="selected">不选择</option>
                    <option value="2">咨询员</option>
                    <option value="3">竞价员</option>
                    <option value="4">程序员</option>
                    <option value="5">导医组</option>
                    <option value="6">医助</option>
                    <option value="7">医生</option>
                    <option value="8">财务</option>
                    <option value="9">院长</option>
                    <option value="10">咨询主管</option>
                    <option value="11">竞价主管</option>
                    <option value="12">网络主管</option>
                    <option value="13">经营主管</option>
                </select>
                <label class="inline">科室可视权限</label>
                <select class="select" name="cid" id="cid" multiple="multiple" style="width:205px;height:100px;">
                    <option value="0" selected="selected">所有科室</option>
                    <option value="7">肾病</option>
                    <option value="21">高血压肾病</option>
                    <option value="39">asa</option>
                    <option value="40">sadas</option>
                </select>
                <label class="inline">医生可视权限<span>医助和医生使用</span></label>
                <select class="select" name="dep" id="dep" multiple="multiple" style="width:205px;height:100px;">
                    <option value="0" selected="selected">不选择</option>
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
                <input type="hidden" name="up" id="up" value="data">
                <input type="hidden" name="id" id="id" value="0">
                <label class="inline"></label>
                <input type="hidden" name="back_url" id="back_url" value="user.asp?s=1">
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
