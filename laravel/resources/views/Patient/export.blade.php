<form id="form_sub" name="form_sub" method="post" action="{{ route('patientExport') }}">
    <label class="inline">数据类型：</label>
    <select class="select" name="type" id="type" style="width:380px;">
        <option value="0" selected="selected">全部患者</option>
        <option value="1">门诊患者</option>
        <option value="2">预约患者</option>
    </select>
    {{ csrf_field() }}
    <label class="inline">时间范围：</label>
    <select class="select" name="month" id="month" style="width:380px;">
        @foreach($months as $month)
        <option value="{{ $month->add_time }}">{{ str_replace('-', '年', $month->add_time)}}月</option>
        @endforeach
    </select>
    <button type="submit" id="submit" class="submit"><span class="icon">&#379;</span>提交</button>
    <button type="button" onclick="closeshow();" class="button"><span class="icon">&#378;</span>关闭</button>
</form>
