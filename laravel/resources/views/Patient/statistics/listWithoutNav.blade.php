                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="220">
                                <center>项 目 名 称</center>
                            </th>
                            <th width="70">
                                <center>就诊人数</center>
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
                                <center><b><i>{{ $all_count }}</i></b></center>
                            </td>
                            <td>&nbsp;</td>
                        </tr>

                        @foreach($data as $key => $item)
                        <tr class="t2">
                            <td>
                                <center><i>{{ $key }}</i></center>
                            </td>
                            <td>
                                <center>{{ $item }}</center>
                            </td>
                            <td>
                                <div class="perws">
                                    <div class="perw" style="width:{{ $all_count? ceil($item/$all_count*100) : '10'  }}%" title="{{ $all_count? ceil($item/$all_count*100) : '0'  }}%">{{ $all_count? ceil($item/$all_count*100) : '0'  }}%</div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>