
    <!--导航-->
    <div class="guide">
        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
            <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="res.asp?s=1&amp;m=res">预约列表</a><span class="ider">&gt;</span></li>
            <li>编辑预约</li>
        </ul>
    </div>
    <div id="wrap" class="wrap">
        <!--整体内容-->
        <div id="container" class="container">
            <div class="top">
                <h3 class="left"><span class="icon">Ą</span>编辑预约</h3>
                <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="res.asp?s=1&amp;m=res" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
            </div>
            <div id="box" class="box">
                <div id="tab">
                    <ul>
                        <li onclick="setTab(0)" class="now">患者信息</li>
                    </ul>
                </div>
                <div id="tablist">
                    <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('res.asp');">
                        <div id="list_0" class="list block">
                            <label class="inline"><em>*</em>姓名：<span style="color:#222;padding-left:65px;"><em>*</em>年龄：</span><span style="color:#222;padding-left:17px;">性别：</span></label>
                            <input name="name" id="name" class="input" value="这些" style="width:95px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" type="text">
                            <input name="age" id="age" class="input" value="13" style="width:35px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                            <select class="select" name="gender" id="gender" style="width:45px;">
                                <option value="1" selected="selected">男</option>
                                <option value="2">女</option>
                            </select>
                            <script>
                            $('name').onblur = function() {
                                check('res.asp', 'name', 21);
                                this.style.backgroundColor = '#fff';
                            }
                            </script>
                            <label class="inline"><em>*</em>手机：<span id="phone_city" style="color:#19A97B;"></span></label>
                            <input name="_phone" id="_phone" class="input" value="132****5558" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                            <input name="phone" id="phone" value="13228595558" type="hidden">
                            <label class="inline"><em>*</em>病历号：</label>
                            <input name="bid" id="bid" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                            <button type="button" onclick="$('bid').value='20170518092308';" class="button">生成</button>
                            <button type="button" onclick="paste('bid');" class="button">粘贴</button>
                            <script>
                            $('bid').onblur = function() {
                                check('res.asp', 'bid', 21);
                                this.style.backgroundColor = '#fff';
                            }
                            </script>
                            <label class="inline">病种分类：</label>
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
                            <label class="inline">分配医生：</label>
                            <select class="select" name="dep" id="dep" style="width:205px;">
                                <option value="0" selected="selected">请选择</option>
                                <option value="6">赵中献</option>
                                <option value="7">黄小松</option>
                                <option value="8">杨惠标</option>
                                <option value="10">王奎</option>
                                <option value="11">张建儒</option>
                            </select>
                            <input name="res" id="res" value="0" type="hidden">
                            <input name="way" id="way" value="6" type="hidden">
                            <input name="postdate" id="postdate" value="2017/6/17 9:00:00" type="hidden">
                            <input name="filepath" id="filepath" value="" type="hidden">
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
                            <input name="address" id="address" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                            <script>
                            setup();
                            preselect('230103');
                            </script>
                            <label class="inline"><em>*</em>备注信息：<span>不能超过500个字符</span></label>
                            <textarea name="content" id="content" class="textarea" style="width:500px;height:100px;" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">撒哒啊想擦阿萨鞋子擦啊实打实大学城啊实打实大师</textarea>
                        </div>
                        <div id="list_1" class="list">
                            <div class="te" style="width: 100%;">
                                <div class="teheader">
                                    <div class="tecontrol" style="background-position: 0px -120px;" title="Bold"></div>
                                    <div class="tecontrol" style="background-position: 0px -150px;" title="Italic"></div>
                                    <div class="tecontrol" style="background-position: 0px -180px;" title="Underline"></div>
                                    <div class="tecontrol" style="background-position: 0px -210px;" title="Strikethrough"></div>
                                    <div class="tedivider"></div>
                                    <div class="tecontrol" style="background-position: 0px -240px;" title="Subscript"></div>
                                    <div class="tecontrol" style="background-position: 0px -270px;" title="Superscript"></div>
                                    <div class="tedivider"></div>
                                    <div class="tecontrol" style="background-position: 0px -300px;" title="Insert Ordered List"></div>
                                    <div class="tecontrol" style="background-position: 0px -330px;" title="Insert Unordered List"></div>
                                    <div class="tedivider"></div>
                                    <div class="tecontrol" style="background-position: 0px -360px;" title="Outdent"></div>
                                    <div class="tecontrol" style="background-position: 0px -390px;" title="Indent"></div>
                                    <div class="tedivider"></div>
                                    <div class="tecontrol" style="background-position: 0px -420px;" title="Left Align"></div>
                                    <div class="tecontrol" style="background-position: 0px -450px;" title="Center Align"></div>
                                    <div class="tecontrol" style="background-position: 0px -480px;" title="Right Align"></div>
                                    <div class="tecontrol" style="background-position: 0px -510px;" title="Block Justify"></div>
                                    <div class="tedivider"></div>
                                    <div class="tecontrol" style="background-position: 0px -720px;" title="Remove Formatting"></div>
                                    <div class="tecontrol" style="background-position: 0px -630px;" title="Insert Horizontal Rule"></div>
                                    <div class="tedivider"></div>
                                    <div class="tecontrol" style="background-position: 0px -540px;" title="Undo"></div>
                                    <div class="tecontrol" style="background-position: 0px -570px;" title="Redo"></div>
                                    <div class="tedivider"></div>
                                    <div class="tecontrol" style="background-position: 0px -750px;" title="Print"></div>
                                </div>
                                <div>
                                    <textarea name="chatlog" id="chatlog" style="width: 100%; display: none;"></textarea>
                                    <iframe width="100%" height="400px" frameborder="0"></iframe>
                                </div>
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
                                cssfile: 'tiny.css',
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
                        </div>
                        <div id="list_2" class="list">
                            <label class="inline">客户职业：</label>
                            <input name="job" id="job" class="input" value="" style="width:200px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                            <label class="inline">QQ号码：</label>
                            <input name="qq" id="qq" class="input" value="" style="width:200px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                            <label class="inline">微信号码：</label>
                            <input name="weixin" id="weixin" class="input" value="" style="width:200px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                            <label class="inline">关键词：</label>
                            <input name="keyword" id="keyword" class="input" value="" style="width:200px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" type="text">
                            <label class="inline">来源网站：</label>
                            <select class="select" name="website" id="website" style="width:210px;">
                                <option value="0" selected="selected">请选择</option>
                                <option value="1">www.xxx.com</option>
                                <option value="2">m.xxx.com</option>
                            </select>
                            <label class="inline">信息来源：</label>
                            <select class="select" name="source" id="source" style="width:210px;">
                                <option value="0" selected="selected">请选择</option>
                                <option value="1">寻医问药</option>
                                <option value="2">999健康</option>
                            </select>
                        </div>
                        <input name="id" id="id" value="21" type="hidden">
                        <input name="up" id="up" value="data" type="hidden">
                        <label class="inline"></label>
                        <input name="back_url" id="back_url" value="res.asp?m=res&amp;s=1" type="hidden">
                        <label class="inline"></label>
                        <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
                        <label class="inline"></label>
                        <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                        <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                        <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
                    </form>
                </div>
                <input name="this_url" id="this_url" value="/res.asp?act=add&amp;id=21&amp;m=res" type="hidden">
            </div>
        </div>
    </div>

