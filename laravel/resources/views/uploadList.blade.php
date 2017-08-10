<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this);set_title('列表');" url="file.asp">上传记录</a><span class="ider">&gt;</span></li>
        <li><span id="guide">列表</span></li>
    </ul>
    <p class="nlink right"><a href="javascript:void(0);" onclick="fastL('file.asp?act=up');" class="sms"><span class="icon">ē</span>纠正数据</a><a href="javascript:void(0);" onclick="fastL('file.asp?act=clear');" class="sms"><span class="icon">ň</span>文件清理</a></p>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ū</span>附件列表</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="display('fun')"><span class="icon">Ş</span>快捷查找</a></p>
        </div>
        <div class="fun none" id="fun">
            <div id="fun-n" class="right">
                <select class="select" onchange="To('file.asp?s=1&amp;n='+this.options[this.selectedIndex].value+'','main');">
                    <option value="0" selected="selected">所有用户</option>
                    <option value="1">医患通</option>
                    <option value="2">咨询</option>
                    <option value="3">导医</option>
                    <option value="4">一株</option>
                    <option value="5">yisheng</option>
                    <option value="6">竞价</option>
                    <option value="7">测试修改</option>
                    <option value="8">acz</option>
                    <option value="9">按照</option>
                    <option value="10">zx</option>
                    <option value="11">啊实打实的</option>
                    <option value="12">撒时段</option>
                </select>
            </div>
        </div>
        <div id="box" class="box">
            <table cellspacing="1" cellpadding="0">
                <thead>
                    <tr>
                        <th width="120">
                            <center>时 间</center>
                        </th>
                        <th width="*">文件名称</th>
                        <th width="70">
                            <center>记 录</center>
                        </th>
                        <th width="70">
                            <center>大 小</center>
                        </th>
                        <th width="300">
                            <center>MD5HASH</center>
                        </th>
                        <th width="70">
                            <center>操 作</center>
                        </th>
                    </tr>
                </thead>
                <tbody id="tablebg">
                @foreach($files as $file)
                    <tr class="t1">
                        <td>
                            <center>{{ formatDate($file->add_time, 'Y-m-d H:i') }}</center>
                        </td>
                        <td><span class="icon">ū</span> <a href="file.asp?act=file&amp;t=2017/08/07/14193402.mp3" title="下载：{{ $file->origin_name }}">{{ $file->origin_name }}</a></td>
                        <td>
                            <center><a href="javascript:void(0);" onclick="msgbox(this,0,200,0);return false;" url="file.asp?act=chk&amp;t=2017/08/07/14193402.mp3" title="跟踪附件使用记录">跟踪</a></center>
                        </td>
                        <td>
                            <center>{{ $file->size }}&nbsp;MB</center>
                        </td>
                        <td>
                            <center>{{ $file->hash }}</center>
                        </td>
                        <td>
                            <center>{{ $file->admin_id }}</center>
                        </td>
                    </tr>
                @endforeach

                    <tr class="t1">
                        <td colspan="6">&nbsp;&nbsp;记录:<i>2</i>条</td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('uploadList') }}">
        </div>
    </div>
</div>
