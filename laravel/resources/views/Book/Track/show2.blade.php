




 
                
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
                
           
      
 

