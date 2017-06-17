<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="tel.asp?s=1">电话列表</a><span class="ider">&gt;</span></li>
        <li>编辑电话</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ą</span>编辑电话</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="tel.asp?s=1&amp;id=5" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
        </div>
        <div id="box" class="box">
            <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('tel-consult.update', ['id'=>$telConsult->id]) }}');">
                <label class="inline">电话姓名：<span style="color:#222;padding-left:42px;">年龄：</span><span style="color:#222;padding-left:23px;">性别：</span></label>
                <input type="text" name="name" id="name" class="input" value="{{ $telConsult->name }}" style="width:95px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
                <input type="text" name="age" id="age" class="input" value="{{ $telConsult->age }}" style="width:35px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <select class="select" name="gender" id="gender" style="width:45px;">
                @if($telConsult->gender == '1')
                    <option value="1" selected="selected">男</option>
                    <option value="2">女</option>
                @else
                    <option value="1">男</option>
                    <option value="2" selected="selected">女</option>
                @endif
                </select>
                <label class="inline">手机号码：<span id="phone_city" style="color:#19A97B;">重庆(023)-联通GSM</span></label>
                <input type="text" name="phone" id="phone" class="input" value="{{ $telConsult->phone }}" style="width: 195px; background-color: rgb(255, 255, 255); background-image: none; border-color: rgb(170, 170, 170); color: rgb(51, 51, 51);" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
                <script>
                check_phone();
                $('phone').onblur = function() {
                    check('tel.asp', 'phone', 5);
                    check_phone();
                    this.style.backgroundColor = '#fff';
                }
                </script>
                <label class="inline">病种分类：</label>
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <select class="select" name="dis" id="dis" style="width:205px;">
                    <option value="8" selected="selected">肾病综合征</option>
                    <option value="9">肌酐</option>
                    <option value="11">慢性肾炎</option>
                    <option value="13">急性肾炎</option>
                    <option value="14">IgA肾病</option>
                    <option value="15">紫癜性肾炎</option>
                    <option value="16">狼疮性肾炎</option>
                    <option value="17">肾囊肿</option>
                    <option value="18">多囊肾</option>
                    <option value="19">肾检</option>
                    <option value="20">糖尿病肾病</option>
                    <option value="21">高血压肾病</option>
                    <option value="22">肾盂肾炎</option>
                    <option value="23">肾结石/肾积水</option>
                    <option value="24">肾萎缩</option>
                    <option value="25">尿蛋白/潜血</option>
                    <option value="26">肾功能不全</option>
                    <option value="27">肾衰竭</option>
                    <option value="28">尿毒症-已透析</option>
                    <option value="38">膜性肾炎</option>
                </select>
                <label class="inline">来源途径：</label>
                <select class="select" name="way" id="way" style="width:205px;">
                    <option value="6" selected="selected">PC商务通</option>
                    <option value="7">手机商务通</option>
                    <option value="8">网站电话</option>
                    <option value="23">糯米电话</option>
                    <option value="32">微信</option>
                    <option value="33">抓取电话</option>
                </select>
                <label class="inline">回访时间：</label>
                <input type="text" name="track_time" id="postdate" class="Wdate" value="2017-06-20 09:00" style="width:193px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
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
                <input name="availability" id="state" class="checkbox" type="checkbox" {{ $telConsult->availability == '0' ? 'checked' : '' }} value="0">
                <label for="state"><i>无效电话</i></label>
                <label class="inline">来源地区：</label>
                <select class="select" name="province" id="province" style="width:100px;">
 
                </select>
                <select class="select" name="city" id="city" style="width:100px;">

                </select>
                <select class="select" name="town" id="town" style="width:100px;">
  
                </select>
                <input type="text" name="address" id="address" class="input" value="{{ $telConsult->address }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <script>
                setup();
                preselect('230103');
                </script>
                <label class="inline"><em>*</em>记录上传：</label>
                <input type="text" name="filepath" id="filepath" class="input" value="{{ $telConsult->filepath }}" style="width:430px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" readonly="true">
                <script>
                $('filepath').setAttribute('readOnly', true);
                </script>
                <button type="button" onclick="msgbox(this);" title="上传资料" url="upload.asp?act=main&amp;to=filepath" class="button"><i class="icon">Ī</i>上传</button>
                <label class="inline">备注信息：</label>
                <textarea name="content" id="content" class="textarea" style="width:500px;height:100px;" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">{{ $telConsult->content }}</textarea>

                <label class="inline"></label>
                <input type="hidden" name="back_url" id="back_url" value="tel.asp?s=1">
                <input type="hidden" name="up" id="up" value="data">
                <label class="inline"></label>
                <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
                <label class="inline"></label>
                <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
            </form>
            <input type="hidden" name="this_url" id="this_url" value="/tel.asp?act=add&amp;id=5">
        </div>
    </div>
</div>
