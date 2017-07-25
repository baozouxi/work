                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="160">
                                <center>项目名称</center>
                            </th>
                            <th width="30">
                                <center>到诊</center>
                            </th>
                            <th width="30">
                                <center>检查</center>
                            </th>
                            <th width="35">
                                <center>消费</center>
                            </th>
                            <th width="50">
                                <center>人均</center>
                            </th>
                            <th width="30">
                                <center>就诊</center>
                            </th>
                            <th width="60">
                                <center>就诊率</center>
                            </th>
                            <th width="65">
                                <center>消费</center>
                            </th>
                            <th width="60">
                                <center>就诊人均</center>
                            </th>
                            <th width="60">
                                <center>到诊人均</center>
                            </th>
                            <th width="30">
                                <center>复诊</center>
                            </th>
                            <th width="60">
                                <center>复诊率</center>
                            </th>
                            <th width="65">
                                <center>消费</center>
                            </th>
                            <th width="60">
                                <center>复诊人均</center>
                            </th>
                           <!--  <th width="30">
                                <center>人次</center>
                            </th>
                            <th width="60">
                                <center>人次人均</center>
                            </th> -->
                            <th width="75">
                                <center>总消费</center>
                            </th>
                            <th width="60">
                                <center>到诊人均</center>
                            </th>
                            <th width="60">
                                <center>就诊人均</center>
                            </th>
                            <!-- <th width="60">
                                <center>人次人均</center>
                            </th> -->
                            <th width="*"></th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td>
                                <center><b><i>合 计</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['all_patient_count'] }}</i></b></center> <!-- 到诊 -->
                            </td>
                            <td>
                                <center><b><i>0</i></b></center><!-- 检查 -->
                            </td>
                            <td>
                                <center><b><i>0</i></b></center><!-- 消费 -->
                            </td>
                            <td>
                                <center><b><i>0</i></b></center><!-- 人均 -->
                            </td>
                            <td>
                                <center><b><i>{{ $total['all_patient_cost_count'] }}</i></b></center><!-- 就诊 -->
                            </td>
                            <td>
                                <center>
                                    <b>
                              <i>{{ percent($total['all_patient_cost_count'], $total['all_patient_count'], 'ceil') }}</i>
                                    </b>
                                </center><!-- 就诊率 -->
                            </td>
                            <td>
                                <center><b><i>{{ $total['take_sum'] }}</i></b></center><!-- 消费 -->
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['take_sum'], $total['all_patient_cost_count']) }}</i></b></center><!-- 就诊人均 -->
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['take_sum'], $total['all_patient_count']) }}</i></b></center><!-- 到诊人均 -->
                            </td>
                            <td>
                                <center><b><i>{{ $total['all_reHospital_count'] }}</i></b></center><!-- 复诊 -->
                            </td>
                            <td>
                                <center>
                                    <b><i>{{ percent($total['all_reHospital_count'], $total['all_patient_count'],'ceil') }}</i></b>
                                </center>
                                <!-- 复诊率 -->
                            </td>
                            <td>
                                <center><b><i>{{$total['reHospital_take_sum']}}</i></b></center><!-- 复诊消费 -->
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['reHospital_take_sum'],$total['all_reHospital_count'])}}</i></b></center><!-- 复诊人均 -->
                            </td>
                          <!--   <td>
                                <center><b><i>0</i></b></center> 人次 
                            </td>
                            <td>
                                <center><b><i>0</i></b></center> 人次人均
                            </td> -->
                            <td>
                                <center><b><i>{{ $total['take_sum'] }}</i></b></center><!-- 总消费 -->
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['take_sum'], $total['all_patient_count']) }}</i></b></center><!-- 到诊人均 -->
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['take_sum'], $total['all_reHospital_count']) }}</i></b></center><!-- 就诊人均 -->
                            </td>
                            <!-- <td>
                                <center><b><i>17.33</i></b></center>
                            </td> -->
                            <td></td>
                        </tr>
                        @foreach($data as $field => $item)
                        @if(is_int($loop->index/2))
                            <tr class="t2">
                        @else
                            <tr class="t1">
                        @endif
                            <td>
                                <center><i>{{ $field }}</i> <a href="javascript:void(0);" onclick="msgbox(this,800);" url="turn.asp?m=stat&amp;o=uid&amp;aid=1&amp;to=m" title="医患通详细列表">[详]</a></center>
                            </td>
                            <td>
                                <center>{{ $item['patient_count'] }}</center> 
                            </td>
                            <td>
                                <center><i>0</i></center>
                            </td>
                            <td>
                                <center>0</center>
                            </td>
                            <td>
                                <center>0</center>
                            </td>
                            <td>
                                <center><i>{{ $item['patient_cost_count'] }}</i></center>
                            </td>
                            <td>
                                <center>{{ percent($item['patient_cost_count'], $item['patient_count'],'ceil') }}</center>
                            </td>
                            <td>
                                <center>{{ $item['take_sum'] }}</center>
                            </td>
                            <td>
                                <center>{{ divide($item['take_sum'], $item['patient_cost_count']) }}</center>
                            </td>
                            <td>
                                <center>{{ divide($item['take_sum'], $item['patient_count']) }}</center>
                            </td>
                            <td>
                                <center><i>{{ $item['reHospital_count'] }}</i></center>
                            </td>
                            <td>
                                <center>{{ percent($item['reHospital_count'], $item['patient_count'], 'ceil') }}</center>
                            </td>
                            <td>
                                <center>{{ $item['reHospital_take_sum'] }}</center>
                            </td>
                            <td>
                                <center>{{ divide($item['reHospital_take_sum'], $item['reHospital_count']) }}</center>
                            </td>
                            <td>
                                <center><i>{{ $item['take_sum'] }}</i></center>
                            </td>
                            <td>
                                <center>{{ divide($item['take_sum'], $item['patient_count']) }}</center>
                            </td>
                            <td>
                                <center><i>{{ divide($item['take_sum'], $item['patient_cost_count']) }}</i></center>
                            </td>
                          <!--   <td>
                                <center>0</center>
                            </td> -->
                            <!-- <td>
                                <center>0</center>
                            </td> -->
                            <!-- <td>
                                <center>0</center>
                            </td> -->
                            <td></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>