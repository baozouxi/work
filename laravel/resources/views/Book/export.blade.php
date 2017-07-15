<form id="form_sub" name="form_sub" method="post" action="{{ route('bookExport') }}">
    <label class="inline">数据类型：</label>
    <select class="select" name="type" id="type" style="width:380px;">
        <option value="0" selected="selected">全部患者</option>
        <option value="1">未到诊</option>
        <option value="2">已到诊</option>
    </select>
    <label class="inline">时间范围：</label>
    <select class="select" name="month" id="month" style="width:380px;">
    @foreach($months as $month)
        <option value="{{ $month->postdate }}">{{ $month->postdate }}月</option>
    @endforeach    
    </select>
    {{ csrf_field() }}
    <button type="submit" id="submit" class="submit"><span class="icon">&#379;</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">&#378;</span>关闭</button>
</form>
