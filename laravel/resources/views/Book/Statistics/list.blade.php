

                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="220">
                                <center>项 目 名 称</center>
                            </th>
                            <th width="70">
                                <center>预约人数</center>
                            </th>
                            <th width="70">
                                <center>到诊人数</center>
                            </th>
                            <th width="70">
                                <center>未到诊数</center>
                            </th>
                            <th width="70">
                                <center>到诊率</center>
                            </th>
                            <th width="*">占有率（预约/到诊）</th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td>
                                <center><b><i>合 计</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['app_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['patient_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['un_arrive'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['arrive_per'] }}%</i></b></center>
                            </td>
                            <td><b><i>蓝色：预约比例 红色：到诊比例 咨询人次：{{ $total['consult_sum'] }}</i></b></td>
                        </tr>
                    @foreach($data as $field => $item)
                    @if(is_int($loop->index/2))
                        <tr class="t2">
                    @else
                        <tr class="t1">
                    @endif
                            <td>
                                <center><a href="javascript:void(0);" onclick="msgbox(this,500);" url="stat_res.asp?act=stat_s_uid&amp;aid=1&amp;to=m"><i>{{ $field }}</i> </a><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;o=uid&amp;aid=1&amp;to=m" title="医患通详细列表">[详]</a></center>
                            </td>
                            <td>
                                <center>{{ $item['app_sum'] }}</center>
                            </td>
                            <td>
                                <center>{{ $item['patient_sum'] }}</center>
                            </td>
                            <td>
                                <center>{{ $item['un_arrive'] }}</center>
                            </td>
                            <td>
                                <center>{{ $item['arrive'] }}</center>
                            </td>
                            <td>
                            
                            @if($item['app_per'] != '0')
                                <div class="pers">
                                    <div class="per" style="width:{{ $item['app_per'] }}%" title="{{ $item['app_per'] }}%"><span>{{ $item['app_per'] }}%</span></div>
                                </div>
                            @else
                                <div class="pers">
                                    <div class="per" style="width:10.0%;background-color: #999;" title="0%"><span>0%</span></div>
                                </div>
                            @endif

                                <div class="perts">
                                    <div class="pert" style="width:{{ $item['arrive_per'] == '0' ? '10' : $item['arrive_per'] }}%" title="{{$item['arrive_per']}}%"><span class="persize">{{$item['arrive_per']}}%</span></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>