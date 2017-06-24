<div id="his_show" style="display: block; position: absolute; width: 600px; height: 321px; top: 331.5px; left: 320px;">
    <h4 id="his_title" onmousedown="Drag(this);"><span class="icon right" onmousedown="closeshow();">ź</span>新增短信</h4>
    <div id="his_content" class="his_content">
        <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('sms.asp');">
            <label class="inline">手机号码<span>群发使用“|”分割,最多五条</span></label>
            <input type="text" name="phone" id="phone" class="input" value="" style="width:565px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';">
            <label class="inline">短信内容<span>可用短信<em>0</em>条</span></label>
            <textarea name="content" id="content" class="textarea" style="width: 565px; height: 100px; background-color: rgb(255, 255, 255);" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';"></textarea>
            <input type="hidden" name="up" id="up" value="data">
            <label class="inline"></label>
            <div name="msg" id="msg" style="width:552px;" class="msg">请稍后..</div>
            <label class="inline"></label>
            <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>提交</button>
            <button type="button" onclick="closeshow();" class="button"><span class="icon">ź</span>关闭</button>
        </form>
    </div>
</div>
