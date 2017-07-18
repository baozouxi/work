
    <!--导航-->
    <div class="guide">
        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="{{ route('index',['s'=>'1']) }}">首页</a><span class="ider">&gt;</span></li>
            <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="turn.asp?s=1&amp;m=turn">患者列表</a><span class="ider">&gt;</span></li>
            <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="reply.asp?s=1&amp;m=turn&amp;aid=8&amp;id=1">回访记录</a><span class="ider">&gt;</span></li>
            <li>编辑回访</li>
        </ul>
    </div>
    <div id="wrap" class="wrap">
        <!--整体内容-->
        <div id="container" class="container">
            <div class="top">
                <h3 class="left"><span class="icon">Ą</span>编辑回访</h3>
                <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="reply.asp?s=1&amp;aid=8&amp;m=turn&amp;id=1" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
            </div>
            <div id="box" class="box">
                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="90">
                                <center>姓名</center>
                            </th>
                            <th width="45">
                                <center>性别</center>
                            </th>
                            <th width="45">
                                <center>年龄</center>
                            </th>
                            <th width="100">
                                <center>手机</center>
                            </th>
                            <th width="120">
                                <center>地区</center>
                            </th>
                            <th width="100">
                                <center>病种</center>
                            </th>
                            <th width="100">
                                <center>媒介</center>
                            </th>
                            <th width="90">
                                <center>就诊医生</center>
                            </th>
                            <th width="120">
                                <center>到诊时间</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td>
                                <center>{{ $data->name }}</center>
                            </td>
                            <td>
                                <center>{{ $data->gender == '1' ? '男' : '女' }}</center>
                            </td>
                            <td>
                                <center>{{ $data->age }}</center>
                            </td>
                            <td>
                                <center>{{ $data->phone }}</center>
                            </td>
                            <td>
                                <center>{{ $data->city }} {{ $data->town }}</center>
                            </td>
                            <td>
                                <center>肾病综合征</center>
                            </td>
                            <td>
                                <center>电视广告</center>
                            </td>
                            <td>
                                <center>赵中献</center>
                            </td>
                            <td>
                                <center>{{ formatDate($data->add_time) }}</center>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td colspan="9">{{ $data->content }}</td>
                        </tr>
                    </tbody>
                </table>
                <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('patienttrack.update',['id'=>$trackData->id]) }}');">
                    <label class="inline"><em>*</em>下次回访日期：</label>
                    <input type="text" name="postdate" id="postdate" class="Wdate" value="{{ $trackData->next_time }}" style="width:205px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                    <script>
                    $('postdate').className = 'Wdate';
                    </script>
                    <script>
                    $('postdate').onfocus = function() {
                        WdatePicker({
                            dateFmt: 'yyyy-MM-dd HH:00',
                            maxDate: '%y-{%M+1}-%d'
                        });
                    }
                    </script>
                    <input name="state" id="state" class="checkbox" {{ $data->undate == '1' ?: 'checked="checked"'  }}  type="checkbox" value="1">
                    <label for="state"><i>取消跟踪</i></label>
                    <label class="inline"><em>*</em>记录上传：</label>
                    <input type="hidden" type="_mei">
                    <input type="text" name="filepath" id="filepath" class="input" value="" style="width:430px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';" readonly="true">
                    <script>
                    $('filepath').setAttribute('readOnly', true);
                    </script>
                    <button type="button" onclick="msgbox(this);" title="上传资料" url="upload.asp?act=main&amp;to=filepath" class="button"><i class="icon">Ī</i>上传</button>
                    <label class="inline">回访信息：</label>
                    <textarea name="content" id="content" class="textarea" style="width:500px;height:100px;" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">{{ $trackData->content }}</textarea>
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="1">
                    <input type="hidden" name="aid" id="aid" value="8">
                    <input type="hidden" name="up" id="up" value="data">
                    <label class="inline"></label>
                    <input type="hidden" name="back_url" id="back_url" value="reply.asp?s=1&amp;aid=8&amp;m=turn">
                    <label class="inline"></label>
                    <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
                    <label class="inline"></label>
                    <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                    <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                    <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
                </form>
                <input type="hidden" name="this_url" id="this_url" value="/reply.asp?act=add&amp;aid=8&amp;id=1&amp;m=turn">
            </div>
        </div>
    </div>

