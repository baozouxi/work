<form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('nav.update', ['id'=>$nav->id]) }}');">
    <select class="select" name="parent_id" id="parent_id" style="width:370px;">
        <option value="0" selected="selected" style="background-color:white;color:blue;">顶级菜单</option>
        @foreach($nav_top_arr as $top)
            <option value="{{ $top->id }}">{{ $top->name }}</option>
        @endforeach
    </select>
    <label class="inline">导航名称</label>
    <input type="text" name="name" id="name" class="input" value="{{ $nav->name }}" style="width:360px;" autocomplete="off" disableautocomplete onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" />
    

    <label class="inline">导航地址（如：/book/add）</label>
    <input type="text" name="url" id="url" class="input" value="{{ $nav->url }}" style="width:360px;" autocomplete="off" disableautocomplete onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" />

    <label class="inline">导航图标</label>
    <input type="text" name="icon" id="icon" class="input" value="{{ $nav->icon }}" style="width:360px;" autocomplete="off" disableautocomplete onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" />

    {{ csrf_field() }}
    <label class="inline"></label>
    <input type="hidden" name="_method" value="PUT">
    <button type="submit" id="submit" class="submit"><span class="icon">&#379;</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">&#378;</span>关闭</button>
    <label class="inline"></label>
    <div name="msg" id="msg" style="width:349px;" class="msg">请稍后..</div>
</form>
