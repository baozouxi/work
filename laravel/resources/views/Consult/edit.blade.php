<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="cons.asp?s=1">咨询列表</a><span class="ider">&gt;</span></li>
        <li>编辑咨询</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">Ą</span>编辑咨询</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="cons.asp?s=1&amp;id=1" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
        </div>
        <div id="box" class="box">
            <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('consult.update', ['id'=>$consult->id]) }}');">
                <label class="inline">咨询姓名：<span style="color:#222;padding-left:42px;">年龄：</span><span style="color:#222;padding-left:23px;">性别：</span></label>
                <input type="text" name="name" id="name" class="input" value="{{ $consult->name }}" style="width:95px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
                <input type="text" name="age" id="age" class="input" value="{{ $consult->age }}" style="width:35px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <select class="select" name="gender" id="gender" style="width:45px;">
                @if($consult->gender == '1')
                    <option value="1" selected="selected">男</option>
                    <option value="2">女</option>
                @else
                    <option value="1">男</option>
                    <option value="2" selected="selected">女</option>
                @endif
                </select>
                <label class="inline">手机号码：<span id="phone_city" style="color:#19A97B;">重庆(023)-联通GSM</span></label>
                {{ csrf_field() }}
                <input type="text" name="phone" id="phone" class="input" value="{{ $consult->phone }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
                <script>
                check_phone();
                $('phone').onblur = function() {
                    check('cons.asp', 'phone', 1);
                    check_phone();
                    this.style.backgroundColor = '#fff';
                }
                </script>
                <label class="inline">病种分类：</label>
                <select class="select" name="dis" id="dis" style="width:205px;">
                @foreach($diseases as $disease)
                @if($disease->id == $consult->dis)
                    <option value="{{ $disease->id }}" selected="selected">{{ $disease->name }}</option>
                @else
                    <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                @endif
                @endforeach
                </select>
                <label class="inline">来源途径：</label>
                <select class="select" name="way" id="way" style="width:205px;">
                @foreach($ways as $way)
                @if($way->id == $consult->way)
                    <option value="{{ $way->id }}" selected="selected">{{ $way->name }}</option>
                @else
                    <option value="{{ $way->id }}">{{ $way->name }}</option>
                @endif
                    
                @endforeach
                </select>
                <label class="inline">回访时间：</label>
                <input type="text" name="track_time" id="postdate" class="Wdate" value="{{ $consult->track_time }}" style="width:193px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
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
                <input type="hidden" name="_method" value="PUT">
                <label class="inline"><em>*</em>记录上传：</label>
                <input type="text" name="filepath" id="filepath" class="input" value="" style="width:430px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" readonly="true">
                <script>
                $('filepath').setAttribute('readOnly', true);
                </script>
                <button type="button" onclick="msgbox(this);" title="上传资料" url="upload.asp?act=main&amp;to=filepath" class="button"><i class="icon">Ī</i>上传</button>
                <label class="inline">来源地区：</label>
                <select class="select" name="province" id="province" style="width:100px;">
                    <option value="0">省份</option>
                    <option value="1">北京市</option>
                    <option value="2">天津市</option>
                    <option value="3">上海市</option>
                    <option value="4">重庆市</option>
                    <option value="5">河北省</option>
                    <option value="6">山西省</option>
                    <option value="7">内蒙古</option>
                    <option value="8">辽宁省</option>
                    <option value="9">吉林省</option>
                    <option value="10">黑龙江省</option>
                    <option value="11">江苏省</option>
                    <option value="12">浙江省</option>
                    <option value="13">安徽省</option>
                    <option value="14">福建省</option>
                    <option value="15">江西省</option>
                    <option value="16">山东省</option>
                    <option value="17">河南省</option>
                    <option value="18">湖北省</option>
                    <option value="19">湖南省</option>
                    <option value="20">广东省</option>
                    <option value="21">广西</option>
                    <option value="22">海南省</option>
                    <option value="23">四川省</option>
                    <option value="24">贵州省</option>
                    <option value="25">云南省</option>
                    <option value="26">西藏</option>
                    <option value="27">陕西省</option>
                    <option value="28">甘肃省</option>
                    <option value="29">青海省</option>
                    <option value="30">宁夏</option>
                    <option value="31">新疆</option>
                    <option value="32">香港</option>
                    <option value="33">澳门</option>
                    <option value="34">台湾省</option>
                </select>
                <select class="select" name="city" id="city" style="width:100px;">
                    <option value="0">地级市</option>
                    <option value="1">成都市</option>
                    <option value="2">广元市</option>
                    <option value="3">绵阳市</option>
                    <option value="4">德阳市</option>
                    <option value="5">南充市</option>
                    <option value="6">广安市</option>
                    <option value="7">遂宁市</option>
                    <option value="8">内江市</option>
                    <option value="9">乐山市</option>
                    <option value="10">自贡市</option>
                    <option value="11">泸州市</option>
                    <option value="12">宜宾市</option>
                    <option value="13">攀枝花市</option>
                    <option value="14">巴中市</option>
                    <option value="15">达州市</option>
                    <option value="16">资阳市</option>
                    <option value="17">眉山市</option>
                    <option value="18">雅安市</option>
                    <option value="19">阿坝州</option>
                    <option value="20">甘孜州</option>
                    <option value="21">凉山州</option>
                </select>
                <select class="select" name="town" id="town" style="width:100px;">
                    <option value="0">市、县级市、县</option>
                    <option value="1">青羊区</option>
                    <option value="2">锦江区</option>
                    <option value="3">金牛区</option>
                    <option value="4">武侯区</option>
                    <option value="5">成华区</option>
                    <option value="6">龙泉驿区</option>
                    <option value="7">青白江区</option>
                    <option value="8">新都区</option>
                    <option value="9">温江区</option>
                    <option value="10">都江堰市</option>
                    <option value="11">彭州市</option>
                    <option value="12">邛崃市</option>
                    <option value="13">崇州市</option>
                    <option value="14">金堂县</option>
                    <option value="15">赵镇</option>
                    <option value="16">双流县</option>
                    <option value="17">郫县</option>
                    <option value="18">郫筒镇</option>
                    <option value="19">大邑县</option>
                    <option value="20">晋原镇</option>
                    <option value="21">蒲江县</option>
                    <option value="22">鹤山镇</option>
                    <option value="23">新津县</option>
                    <option value="24">五津镇</option>
                </select>
                <input type="text" name="address" id="address" class="input" value="{{ $consult->address }}" style="width: 195px; background-color: rgb(255, 255, 255);" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <script>
                setup();
                preselect('230103');
                </script>
                <label class="inline">备注信息：</label>
                <textarea name="content" id="content" class="textarea" style="width:500px;height:100px;" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">{{ $consult->content }}</textarea>
                <label class="inline"></label>
                <input type="hidden" name="back_url" id="back_url" value="cons.asp?s=1">
                <input type="hidden" name="up" id="up" value="data">
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
