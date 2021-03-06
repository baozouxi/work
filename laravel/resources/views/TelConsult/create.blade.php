<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="tel.asp?s=1">电话列表</a><span class="ider">&gt;</span></li>
        <li>新增电话</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ŷ</span>新增电话</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="tel.asp?s=1" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
        </div>
        <div id="box" class="box">
            <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('tel-consult.store') }}');">
                <label class="inline">电话姓名：<span style="color:#222;padding-left:42px;">年龄：</span><span style="color:#222;padding-left:23px;">性别：</span></label>
                <input type="text" name="name" id="name" class="input" value="匿名" style="width:95px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
                <input type="text" name="age" id="age" class="input" value="" style="width:35px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <select class="select" name="gender" id="gender" style="width:45px;">
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
                <label class="inline">手机号码：<span id="phone_city" style="color:#19A97B;"></span></label>
                <input type="text" name="phone" id="phone" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
                <script>
                    check_phone();
                    $('phone').onblur = function() {
                         if(!check_phone()) return;
                            check('/callback/check/TelConsult/phone/'+this.value, 'phone', 0);
                        this.style.backgroundColor = '#fff';
                    }
                </script>
                <label class="inline">病种分类：</label>
                <select class="select" name="dis" id="dis" style="width:205px;">
                @foreach($diseases as $disease)
                    <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                @endforeach
                </select>
                <label class="inline">来源途径：</label>
                <select class="select" name="way" id="way" style="width:205px;">
                @foreach($ways as $way)
                    <option value="{{ $way->id }}">{{ $way->name }}</option>
                @endforeach
                </select>
                <label class="inline">回访时间：</label>
                <input type="text" name="track_time" id="postdate" class="Wdate" value="" style="width:193px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <script>
                $('postdate').className = 'Wdate';
                $('postdate').onfocus = function() {
                    WdatePicker({
                        dateFmt: 'yyyy-MM-dd HH:00',
                        minDate: '%y-%M-%d',
                        maxDate: '%y-{%M+1}-%d'
                    });
                }
                </script>
                <input name="availability" id="state" class="checkbox" type="checkbox" value="0">
                <label for="state"><i>无效电话</i></label>
                <label class="inline">来源地区：</label>
                {{ csrf_field() }}
                <select class="select" name="province" id="province" style="width:100px;">

                </select>
                <select class="select" name="city" id="city" style="width:100px;">

                </select>
                <select class="select" name="town" id="town" style="width:100px;">

                </select>
                <input type="text" name="address" id="address" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <script>
                setup();
                preselect('230103');
                </script>
                <label class="inline"><em>*</em>记录上传：</label>
                <input type="text" name="filepath" id="filepath" class="input" value="" style="width:430px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" readonly="true">
                <script>
                $('filepath').setAttribute('readOnly', true);
                </script>
                <button type="button" onclick="msgbox(this);" title="上传资料" url="upload.asp?act=main&amp;to=filepath" class="button"><i class="icon">Ī</i>上传</button>
                <label class="inline">备注信息：</label>
                <textarea name="content" id="content" class="textarea" style="width:500px;height:100px;" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';"></textarea>
                <label class="inline"></label>
                <input type="hidden" name="back_url" id="back_url" value="tel.asp?s=1">
                <label class="inline"></label>
                <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
                <label class="inline"></label>
                <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
            </form>
        </div>
    </div>
</div>
