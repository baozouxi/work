<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        {!! guideHtml('预约列表', route('book.index')) !!}
        <li>修改预约</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ŷ</span>修改预约</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="res.asp?s=1&amp;m=res" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
        </div>
    
        <div id="box" class="box">
            <div id="tab">
                <ul>
                    <li onclick="setTab(0)" class="now">患者信息</li>
                    <li onclick="setTab(1)">聊天记录</li>
                    <li onclick="setTab(2)">其它信息</li>
                </ul>
            </div>
            <div id="tablist">
                <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('book.update',['id'=>$data->id]) }}');">
                    <div id="list_0" class="list block">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label class="inline"><em>*</em>姓名：<span style="color:#222;padding-left:65px;"><em>*</em>年龄：</span><span style="color:#222;padding-left:17px;">性别：</span></label>
                        <input name="name" id="name" class="input" value="{{ $data->name }}" style="width:95px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" type="text">
                        <input name="age" id="age" class="input" value="{{ $data->age }}" style="width:35px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                        <select class="select" name="gender" id="gender" style="width:45px;">
                            @if ($data->gender == '1')
                                <option value="1" selected="selected">男</option>
                                <option value="2">女</option>
                            @else
                                <option value="1">男</option>
                                <option value="2" selected="selected">女</option>
                            @endif
                        </select>
                        <script>
                        $('name').onblur = function() {
                            check('/callback/check/Appointment/name/'+this.value , 'name', 0);
                            this.style.backgroundColor = '#fff';
                        }
                        </script>
                        <label class="inline"><em>*</em>手机：<span id="phone_city" style="color:#19A97B;"></span></label>
                        <input name="phone" id="phone" class="input" value="{{ $data->phone }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" type="text">
                        <!-- <input name="sms" id="sms" value="0" type="hidden"> -->
                        <script>
                        // check_phone();
                        $('phone').onblur = function() {

                            if(!check_phone()) return;
                            check('/callback/check/Appointment/phone/'+this.value, 'phone', 0);
                            // check_phone();
                            this.style.backgroundColor = '#fff';
                        }
                        </script>
                        <input type="hidden" name="_method" value="PUT">
                        <label class="inline">病种分类：</label>
                        <select class="select" name="disease" id="dis" style="width:205px;">
                            <option value="2">大骨病</option>
                        </select>
                        <!-- <input name="res" id="res" value="1" type="hidden">
                        <input name="dep" id="dep" value="1" type="hidden"> -->
                        <label class="inline">来源途径：</label>
                        <select class="select" name="way" id="way" style="width:205px;">
                            <option value="2">PC商务通</option>
                            <option value="3">手机商务通</option>
                            <option value="4">网站电话</option>
                        </select>
                        <label class="inline"><em>*</em>预约时间：<span>如不确定，在随诊前面打勾</span></label>
                        <input name="postdate" id="postdate" class="Wdate" value="{{ $data->postdate }}" style="width:193px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
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
                        <input name="undate" id="undate" class="checkbox" value="{{ $data->undate }}" {{ $data->undate == '1' ? 'checked' : '' }} type="checkbox">
                        <label for="undate">随诊</label>
                        <label class="inline"><em>*</em>记录上传：</label>
                        <input name="filepath" id="filepath" class="input" value="" style="width:430px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" readonly="true" type="text">
                        <script>
                        $('filepath').setAttribute('readOnly', true);
                        </script>
                        <button type="button" onclick="msgbox(this);" title="上传资料" url="{{ route('uploadHtml') }}" class="button"><i class="icon">Ī</i>上传</button>
                        <label class="inline">来源地区：</label>
                        <select class="select" name="province" id="province" style="width:100px;">
                           
                        </select>
                        <select class="select" name="city" id="city" style="width:100px;">
                         
                        </select>
                        <select class="select" name="town" id="town" style="width:100px;">
                           
                        </select>
                        <input name="address" id="address" class="input" value="{{ $data->address }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                        <script>
                        setup();

                        preselect('{{ $data->province < "10" ? "0".$data->province : $data->province }}{{ $data->city < "10" ? "0".$data->city : $data->city }}{{ $data->town < "10" ? "0".$data->town : $data->town }}');
                        </script>
                        <label class="inline"><em>*</em>备注信息：<span>不能超过500个字符</span></label>
                        <textarea name="content" id="content" class="textarea" style="width:500px;height:100px;" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">{{ $data->content }}</textarea>
                    </div>
                    <div id="list_1" class="list" style="display: none;">
                        <textarea name="chatlog" id="chatlog"  style="width: 100%; display: none;">{{ $logData->log or '' }}</textarea>
                    </div>
                    <script type="text/javascript">
                    var instance = new TINY.editor.edit('o', {
                        id: 'chatlog',
                        width: '100%',
                        height: '400px',
                        cssclass: 'te',
                        controlclass: 'tecontrol',
                        rowclass: 'teheader',
                        dividerclass: 'tedivider',
                        controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|', 'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign', 'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', 'hr', '|', 'undo', 'redo', '|', 'print'],
                        fonts: ['Verdana', 'Arial', 'Georgia', 'Trebuchet MS'],
                        xhtml: true,
                        cssfile: '/css/tiny.css',
                        css: 'swt',
                        bodyid: 'editor',
                        footerclass: 'tefooter',
                        toggle: {
                            text: 'source',
                            activetext: 'wysiwyg',
                            cssclass: 'toggle'
                        },
                        resize: {
                            cssclass: 'resize'
                        }
                    });
                    </script>
                    <div id="list_2" class="list" style="display: none;">
                        <label class="inline">客户职业：</label>
                        <input name="job" id="job" class="input" value="{{ $data->job }}" style="width:200px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                        <label class="inline">QQ号码：</label>
                        <input name="qq" id="qq" class="input" value="{{ $data->qq }}" style="width:200px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                        <label class="inline">微信号码：</label>
                        <input name="weixin" id="weixin" class="input" value="{{ $data->weixin }}" style="width:200px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                        <label class="inline">关键词：</label>
                        <input name="keyword" id="keyword" class="input" value="{{ $data->keyword }}" style="width:200px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                        <label class="inline">来源网站：</label>
                        <select class="select" name="website" id="website" style="width:210px;">
                            <option value="0">请选择</option>
                            <option value="1">www.xxx.com</option>
                            <option value="2">m.xxx.com</option>
                        </select>
                        <label class="inline">信息来源：</label>
                        <select class="select" name="source" id="source" style="width:210px;">
                            <option value="0">请选择</option>
                            <option value="1">寻医问药</option>
                            <option value="2">999健康</option>
                        </select>
                    </div>
                    <input name="id" id="id" value="0" type="hidden">
                    <input name="up" id="up" value="data" type="hidden">
                    <label class="inline"></label>
                    <input name="back_url" id="back_url" value="{{ url('/book') }}" type="hidden">
                    <label class="inline"></label>
                    <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
                    <label class="inline"></label>
                    <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                    <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                    <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
                </form>
            </div>
        </div>
        <input name="this_url" id="this_url" value="/res.asp?act=add&amp;m=res" type="hidden">
    </div>
</div>
</div>
