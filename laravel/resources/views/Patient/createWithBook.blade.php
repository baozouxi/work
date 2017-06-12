
    <!--导航-->
    <div class="guide">
        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
            <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="turn.asp?s=1&amp;m=turn">患者列表</a><span class="ider">&gt;</span></li>
            <li>新增患者</li>
        </ul>
    </div>
    <div id="wrap" class="wrap">
        <!--整体内容-->
        <div id="container" class="container">
            <div class="top">
                <h3 class="left"><span class="icon">ŷ</span>新增患者</h3>
                <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="turn.asp?s=1&amp;m=turn" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
            </div>
            <div id="box" class="box">
                <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('patient.store') }}');">
                    <label class="inline">患者姓名：<span style="color:#222;padding-left:46px;">年龄：</span><span style="color:#222;padding-left:17px;">性别：</span></label>
                    <input type="text" name="name" id="name" class="input" value="{{ $book->name }}" style="width:95px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
                    <input type="text" name="age" id="age" class="input" value="{{ $book->age }}" style="width:35px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                    <select class="select" name="gender" id="gender" style="width:45px;">
                        @if($book->gender == '1')
                            <option value="1" selected="selected">男</option>
                            <option value="2">女</option>
                         @else
                            <option value="1">男</option>
                            <option value="2" selected="selected">女</option>
                         @endif   
                    </select>
                    <script>
                    $('name').onblur = function() {
                        check('/callback/check/Patient/name/'+this.value , 'name', 0);
                        this.style.backgroundColor = '#fff';
                    }
                    </script>
                    <label class="inline">手机号码：<span id="phone_city" style="color:#19A97B;"></span></label>
                    <input type="text" name="phone" id="phone" class="input" value="{{ $book->phone }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
                    <script>
                    check_phone();
                    $('phone').onblur = function() {
                         if(!check_phone()) return;
                            check('/callback/check/Patient/phone/'+this.value, 'phone', 0);
                        this.style.backgroundColor = '#fff';
                    }
                    </script>
                    <label class="inline">病历号：</label>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" name="bid" id="bid" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                    <button type="button" onclick="$('bid').value='{{ $medical_num }}';" class="button">生成</button>
                    <button type="button" onclick="paste('bid');" class="button">粘贴</button>
                    <label class="inline">病种分类：</label>
                    <select class="select" name="dis" id="dis" style="width:205px;">
                        <option value="8">肾病综合征</option>
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
                    <label class="inline">分配医生：</label>
                    <select class="select" name="dep" id="dep" style="width:205px;">
                        <option value="6">赵中献</option>
                        <option value="7">黄小松</option>
                        <option value="8">杨惠标</option>
                        <option value="10">王奎</option>
                        <option value="11">张建儒</option>
                    </select>
                    <input type="hidden" name="res" id="res" value="0">
                    <label class="inline">宣传媒体：</label>
                    <label class="inline">来源地区：</label>
                    <select class="select" name="province" id="province" style="width:100px;">

                    </select>
                    <select class="select" name="city" id="city" style="width:100px;">

                    </select>
                    <select class="select" name="town" id="town" style="width:100px;">

                    </select>
                    <input type="text" name="address" id="address" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="true" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                    <script>
                    setup();
                    preselect('230103');
                    </script>
                    <label class="inline">备注信息：</label>
                    <textarea name="content" id="content" class="textarea" style="width:500px;height:100px;" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">{{ $book->content }}</textarea>
                    <input type="hidden" name="id" id="id" value="0">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <label class="inline"></label>
                    <input type="hidden" name="back_url" id="back_url" value="turn.asp?m=turn&amp;s=1">
                    <input type="hidden" name="up" id="up" value="turn">
                    <label class="inline"></label>
                    <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
                    <label class="inline"></label>
                    <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                    <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                    <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
                </form>
                <input type="hidden" name="this_url" id="this_url" value="/turn.asp?act=add&amp;m=turn">
            </div>
        </div>
    </div>

