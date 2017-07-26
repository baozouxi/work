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
                                <center><b><i>{{ $total['all_count'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['arrive'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['un_arrive'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ percent($total['arrive'], $total['all_count']) }}</i></b></center>
                            </td>
                            <td><b><i>蓝色：预约比例 红色：到诊比例 咨询人次：</i></b></td>
                        </tr>
                        @foreach($data_arr as $field => $data)
                        <tr class="t2">
                            <td>
                                <center><a href="javascript:void(0);" onclick="msgbox(this,500);" url="stat_res.asp?act=stat_s_uid&amp;aid=1&amp;to=m"><i>{{ $field }}</i> </a><a href="javascript:void(0);" onclick="msgbox(this,800);" url="res.asp?m=stat&amp;o=uid&amp;aid=1&amp;to=m" title="医患通详细列表">[详]</a></center>
                            </td>
                            <td>
                                <center>{{ $data['all_count'] }}</center>
                            </td>
                            <td>
                                <center>{{ $data['arrive'] }}</center>
                            </td>
                            <td>
                                <center>{{ $data['un_arrive'] }}</center>
                            </td>
                            <td>
                                <center>{{ percent($data['arrive'], $data['all_count'], 'ceil') }}</center>
                            </td>
                            <td>
                                <div class="pers">
                                    <div class="per" style="width:{{ percent($data['all_count'], $total['all_count'], 'ceil') }}" title="{{ percent($data['all_count'], $total['all_count'], 'ceil') }}"><span>{{ percent($data['all_count'], $total['all_count'], 'ceil') }}</span></div>
                                </div>
                                <div class="perts">
                                    <div class="pert" style="width:{{ percent($data['arrive'], $total['arrive'], 'ceil') }}" title="{{ percent($data['arrive'], $total['arrive'], 'ceil') }}"><span class="persize">{{ percent($data['arrive'], $total['arrive'], 'ceil') }}</span></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>