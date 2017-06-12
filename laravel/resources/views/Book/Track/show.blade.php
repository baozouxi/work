
    <!--导航-->
    <div class="guide">
        <ul class="left">
            <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
            <li><a href="javascript:void(0);" onclick="fastH(this,'main')" url="res.asp?s=1&amp;m=res">预约列表</a><span class="ider">&gt;</span></li>
            <li><span id="guide">回访记录</span></li>
        </ul>
    </div>
    <div id="wrap" class="wrap">
        <!--整体内容-->
        <div id="container" class="container">
            <div class="top">
                <h3 class="left"><span class="icon">į</span>回访记录</h3>
                <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="res.asp?s=1&amp;m=res" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
            </div>
            <div class="fun">
                <h3 class="left"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('booktrack.create') }}"><span class="icon">ŷ</span>新增回访</a></h3></div>
            <div id="box" class="box">
                
                @include('book.track.info')

                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="120">
                                <center>回访时间</center>
                            </th>
                            <th width="*">内 容</th>
                            <th width="120">
                                <center>下次回访</center>
                            </th>
                            <th width="90">
                                <center>操作</center>
                            </th>
                            <th width="30">
                                <center>删</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                    @if(count($TrackData) < 1 )
                        <tr class="t1">
                            <td colspan="5">
                                <center>暂无数据</center>
                            </td>
                        </tr>
                    @else
                        @foreach($TrackData as $key => $trackItem)
                            @if(is_int($key/2))
                             <tr class="t1">
                            @else
                             <tr class="t2">
                            @endif
                                <td>
                                    <center><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('booktrack.edit', ['id'=>$trackItem->id]) }}" title="记录编辑">{{ date('Y-m-d H:i', strtotime($trackItem->add_time))  }}</a></center>
                                </td>
                                <td>{{ $trackItem->content }}&nbsp;</td>
                                <td>
                                    <center>{{ date('Y-m-d H:i', strtotime($trackItem->next_time))  }}</center>
                                </td>
                                <td>
                                    <center>咨询</center>
                                </td>
                                <td>
                                    <center><a href="javascript:void(0);" id="del4" style="color:red" onclick="if(confirm('确定删除吗？\n\n该操作不可恢复')){fast('track.asp?act=del&amp;id=4','del4');}"><span class="icon"><em>ź</em></span></a></center>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
                <input type="hidden" name="this_url" id="this_url" value="/track.asp?aid=5&amp;m=res">
            </div>
        </div>
    </div>

