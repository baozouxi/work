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

                            <th width="75">
                                <center>总消费</center>
                            </th>
                            <th width="60">
                                <center>到诊人均</center>
                            </th>
                            <th width="60">
                                <center>就诊人均</center>
                            </th>

                            <th width="*"></th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td>
                                <center><b><i>合 计</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['patient_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>0</i></b></center>
                            </td>
                            <td>
                                <center><b><i>0</i></b></center>
                            </td>
                            <td>
                                <center><b><i>0</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['treatment_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>
             {{ $total['patient_sum'] == '0' ? '0' : ceil($total['treatment_sum'] / $total['patient_sum']*100) }}%
                                </i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['treatment_cost_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>
        {{ $total['treatment_sum'] == '0' ? '0' :  ceil($total['treatment_cost_sum'] / $total['treatment_sum']) }}
                                </i></b></center>
                            </td>
                            <td>
                                <center><b><i>
         {{  $total['patient_sum'] == '0' ? '0' : ceil($total['treatment_cost_sum'] / $total['patient_sum']) }}
                                </i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['re_treatment_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>
        {{ $total['treatment_sum'] == '0' ? '0' : ceil($total['re_treatment_sum'] / $total['treatment_sum']*100) }}%
                                </i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['re_treatment_takes_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>
    {{ $total['re_treatment_sum'] == '0' ? '0' : ceil($total['re_treatment_takes_sum'] / $total['re_treatment_sum']) }}
                                </i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['take_sum'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>
    {{ $total['patient_sum'] == '0' ? '0' : ceil($total['take_sum'] / $total['patient_sum']) }}
                                </i></b></center>
                            </td>
                            <td>
                                <center><b><i>
            {{ $total['treatment_sum'] == '0' ? '0' : ceil($total['take_sum'] / $total['treatment_sum']) }}
                                </i></b></center>
                            </td>
                            <td></td>
                        </tr>
                        @foreach($data as $field=> $item)
                        <tr class="t2">
                            <td>
                                <center><i>{{ $field }}</i> <a href="javascript:void(0);" onclick="msgbox(this,800);" url="turn.asp?m=stat&amp;o=uid&amp;aid=1&amp;to=m" title="医患通详细列表">[详]</a></center>
                            </td>
                            <td>
                                <center>{{ $item['patient_sum'] }}</center>
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
                                <center><i>{{ $item['treatment_sum'] }}</i></center>
                            </td>
                            <td>
                                <center>
                                {{ $item['patient_sum'] == '0' ? '0' : ceil($item['treatment_sum']/$item['patient_sum']*100) }}%
                                </center>
                            </td>
                            <td>
                                <center>{{ $item['treatment_takes_sum'] - $item['re_treatment_takes_sum'] }}</center>
                            </td>
                            <td>
                                <center>
                         {{$item['treatment_sum'] == '0' ? '0' : ceil(($item['treatment_takes_sum'] - $item['re_treatment_takes_sum'])/$item['treatment_sum']) }}
                                </center>
                            </td>
                            <td>
                                <center>
                        {{$item['patient_sum'] == '0' ? '0' : ceil(($item['treatment_takes_sum'] - $item['re_treatment_takes_sum'])/$item['patient_sum']) }}
                                </center>
                            </td>
                            <td>
                                <center><i>{{ $item['re_treatment_sum'] }}</i></center>
                            </td>

                            <td>
                                <center>{{$item['treatment_sum'] == '0' ? '0' : ceil($item['re_treatment_sum']/$item['treatment_sum']*100) }}%</center>
                            </td>
                            <td>
                                <center><i>{{ $item['re_treatment_takes_sum'] }}</i></center>
                            </td>
                            <td>
                                <center>{{$item['re_treatment_sum'] == '0' ? '0' :  ceil($item['re_treatment_takes_sum']/$item['re_treatment_sum']) }}</center>
                            </td>
                            <td>
                                <center><i>{{ $item['treatment_takes_sum'] }}</i></center>
                            </td>
                            <td>
                                <center>{{ $item['patient_sum'] == '0' ? '0' :  ceil($item['treatment_takes_sum']/$item['patient_sum']) }}</center>
                            </td>
                            <td>
                                <center>{{ $item['treatment_sum'] == '0' ? '0' :  ceil($item['treatment_takes_sum']/$item['treatment_sum']) }}</center>
                            </td>

                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>