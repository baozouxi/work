                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="150">
                                <center>项 目 名 称</center>
                            </th>
                            <th width="65">
                                <center>消费</center>
                            </th>
                            <th width="65">
                                <center>展现</center>
                            </th>
                            <th width="55">
                                <center>点击</center>
                            </th>
                            <th width="55">
                                <center>点击率</center>
                            </th>
                            <th width="55">
                                <center>点击成本</center>
                            </th>
                            <th width="*">占有率</th>
                        </tr>
                    </thead>
                    <tbody id="tablebg">
                        <tr class="t1">
                            <td>
                                <center><b><i>合 计</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['cost'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['show_times'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['click'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ percent($total['click'], $total['show_times'], 'normal', '2') }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ divide($total['cost'], $total['click']) }}</i></b></center>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                        @foreach($data_arr as $field => $record)
                        <tr class="t2">
                            <td>
                                <center><i>{{ $field }}</i></center>
                            </td>
                            <td>
                                <center>{{ $record['cost'] }}</center>
                            </td>
                            <td>
                                <center>{{ $record['show_times'] }}</center>
                            </td>
                            <td>
                                <center>{{ $record['click'] }}</center>
                            </td>
                            <td>
                                <center>{{ percent($record['click'], $record['show_times'], 'normal', '2') }}</center>
                            </td>
                            <td>
                                <center>{{ divide($record['cost'], $record['click']) }}</center>
                            </td>
                            <td>
                                <div class="perws">
                                    <div class="perw" style="min-width:10%;width:{{ percent($record['cost'], $total['cost'],'normal', '2')  }}" title="{{ percent($record['cost'], $total['cost'],'normal', '2')  }}">{{ percent($record['cost'], $total['cost'],'normal', '2')  }}</div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>