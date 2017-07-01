<form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('doctor.store') }}');">
    <select class="select" name="dis_id" id="dis_id" style="width:370px;">
    @foreach($dis as $disItem)
        <option value="{{ $disItem->id }}">{{ $disItem->name }}</option>
    @endforeach

    </select>
    <label class="inline">医生名称</label>
    {{ csrf_field() }}
    <input type="text" name="name" id="name" class="input" value="" style="width:360px;" autocomplete="off" disableautocomplete onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" />
    <label class="inline"></label>
    <button type="submit" id="submit" class="submit"><span class="icon">&#379;</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">&#378;</span>关闭</button>
    <label class="inline"></label>
    <div name="msg" id="msg" style="width:349px;" class="msg">请稍后..</div>
</form>
