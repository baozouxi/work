
    <!--导航-->
    <div class="guide">
        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
            <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="rank.asp?s=1">竞价列表</a><span class="ider">&gt;</span></li>
            <li>编辑竞价</li>
        </ul>
    </div>
    <div id="wrap" class="wrap">
        <!--整体内容-->
        <div id="container" class="container">
            <div class="top">
                <h3 class="left"><span class="icon">Ą</span>编辑竞价</h3>
                <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="rank.asp?s=1" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
            </div>
            <div id="box" class="box">
                <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('rank-record.update',['id'=>$record->id]) }}');">
                    <label class="inline">竞价来源：</label>
                    <select class="select" name="rank_way" id="rank_way" style="width:205px;">
                    @foreach($ranks as $rank)
                        <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                    @endforeach
                    </select>
                    <label class="inline">消费金额：</label>
                    <input type="text" name="cost" id="cost" class="input" value="{{ $record->cost }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                    <label class="inline">展现量：</label>
                    <input type="text" name="show_times" id="show_times" class="input" value="{{ $record->show_times }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                    <label class="inline">点击量：</label>
                    <input type="text" name="click" id="click" class="input" value="{{ $record->click }}" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                    <label class="inline"><em>*</em>消费日期：</label>
                    <input type="text" name="rank_date" id="rank_date" class="Wdate" value="{{ $record->rank_date }}" style="width:193px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <script>
                    $('rank_date').className = 'Wdate';
                    $('rank_date').onfocus = function() {
                        WdatePicker({
                            doubleCalendar: false,
                            dateFmt: 'yyyy-MM-dd',
                            maxDate: '%y-%M-{%d-1}'
                        });
                    }
                    </script>
                    <label class="inline">备注信息：</label>
                    <textarea name="content" id="content" class="textarea" style="width:500px;height:100px;" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';">{{ $record->content }}</textarea>
                    <label class="inline"></label>
                    <label class="inline"></label>
                    <div name="msg" id="msg" style="width:484px;" class="msg">请稍后..</div>
                    <label class="inline"></label>
                    <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                    <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                    <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
                </form>
                <input type="hidden" name="this_url" id="this_url" value="">
            </div>
        </div>
    </div>
