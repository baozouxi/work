<form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('disease.update',['id'=>$current->id]) }}');">
    <select class="select" name="parent_id" id="parent_id" style="width:370px;">
        <option value="0" selected="selected" style="background-color:white;color:blue;">根目录</option>
        @foreach($total as $dItem)
        <option value="{{ $dItem->id }}">{{ $dItem->name }}</option>
        @endforeach
    </select>
    <label class="inline">分类名称</label>
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" id="name" class="input" value="{{ $current->name }}" style="width:360px;" autocomplete="off" disableautocomplete onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" />
    <label class="inline"></label>
    {{ csrf_field() }}
    <button type="submit" id="submit" class="submit"><span class="icon">&#379;</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">&#378;</span>关闭</button>
    <label class="inline"></label>
    <div name="msg" id="msg" style="width:349px;" class="msg">请稍后..</div>
</form>
