<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="turn.asp?s=1&amp;m=turn">患者列表</a><span class="ider">&gt;</span></li>
        <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="take.asp?s=1&amp;m=turn&amp;aid=8">消费记录</a><span class="ider">&gt;</span></li>
        <li>新增消费</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ŷ</span>新增消费</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="take.asp?s=1&amp;aid=8&amp;m=turn" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
        </div>
        <div id="box" class="box">
			
			@include('patient.track.info')

            <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('take.store') }}');">
                <label class="inline"><em>*</em>分配医生：</label>
                <select class="select" name="doctor" id="dep" style="width:205px;">
                    <option value="6">赵中献</option>
                    <option value="7">黄小松</option>
                    <option value="8">杨惠标</option>
                    <option value="10">王奎</option>
                    <option value="11">张建儒</option>
                </select>
                <label class="inline"><em>*</em>药量（天）：</label>
                <input type="text" name="dose" id="cycle" class="input" value="" style="width: 435px; background-color: rgb(255, 255, 255);" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <label class="inline"><em>*</em>检查费：</label>
				{{ csrf_field() }}
                <input type="text" name="check_cost" id="find" class="input" value="" style="width: 435px; background-color: rgb(255, 255, 255);" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <label class="inline"><em>*</em>治疗费：</label>
                <input type="text" name="treatment_cost" id="cure" class="input" value="" style="width:435px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <label class="inline"><em>*</em>药品费：</label>
                <input type="text" name="drug_cost" id="drug" class="input" value="" style="width:435px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <label class="inline"><em>*</em>住院费：</label>
                <input type="text" name="hospitalization_cost" id="hos" class="input" value="" style="width:435px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                <label class="inline">备注：</label>
                <textarea name="content" id="content" class="textarea" style="width:500px;height:100px;" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';"></textarea>
                <label class="inline"></label>
                <label class="inline"></label>
                <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
                <label class="inline"></label>
                <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
            </form>
            <input type="hidden" name="this_url" id="this_url" value="/take.asp?act=add&amp;aid=8&amp;m=turn">
        </div>
    </div>
</div>
