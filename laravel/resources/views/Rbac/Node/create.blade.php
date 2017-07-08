<form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('node.store') }}');">
    <select class="select" name="group_id" id="group_id" style="width:370px;">
        <option value="0" selected="selected" style="background-color:white;color:blue;">未分类</option>
    @foreach($group as $gItem)
        <option value="{{ $gItem->id }}">{{ $gItem->name }}</option>
    @endforeach
    </select>
    <label class="inline">节点名称</label>
    <input type="text" name="name" id="name" class="input" value="" style="width:360px;" autocomplete="off" disableautocomplete onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" />
    

    <label class="inline">中文名称</label>
    <input type="text" name="nickname" id="nickname" class="input" value="" style="width:360px;" autocomplete="off" disableautocomplete onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" />

    {{ csrf_field() }}
    <label class="inline"></label>
    <button type="submit" id="submit" class="submit"><span class="icon">&#379;</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">&#378;</span>关闭</button>
    <label class="inline"></label>
    <div name="msg" id="msg" style="width:349px;" class="msg">请稍后..</div>
</form>
