<form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('disease.store') }}');">
    <select class="select" name="sid" id="sid" style="width:370px;">
        <option value="0" selected="selected" style="background-color:white;color:blue;">根目录</option>
        <option value="7">肾病</option>
    </select>
    <label class="inline">分类名称</label>
    <input type="text" name="name" id="name" class="input" value="" style="width:360px;" autocomplete="off" disableautocomplete onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" />

    {{ csrf_field() }}
    <label class="inline"></label>
    <button type="submit" id="submit" class="submit"><span class="icon">&#379;</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">&#378;</span>关闭</button>
    <label class="inline"></label>
    <div name="msg" id="msg" style="width:349px;" class="msg">请稍后..</div>
</form>
