                <table cellspacing="1" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="150">
                                <center>项 目 名 称</center>
                            </th>
                            <th width="65">
                                <center>对话</center>
                            </th>
                            <th width="65">
                                <center>预约</center>
                            </th>
                            <th width="55">
                                <center>到诊</center>
                            </th>
                            <th width="55">
                                <center>预约率</center>
                            </th>
                            <th width="55">
                                <center>到诊率</center>
                            </th>
                            <th width="55">
                                <center>转换率</center>
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
                                <center><b><i>{{ $total['all_count'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['book_count'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ $total['arrive'] }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ percent($total['book_count'], $total['all_count'],'normal', '2') }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ percent($total['arrive'], $total['book_count'],'normal', '2') }}</i></b></center>
                            </td>
                            <td>
                                <center><b><i>{{ percent($total['arrive'], $total['all_count'],'normal', '2') }}</i></b></center>
                            </td>
                            <td><b><i>蓝色：预约比例 红色：到诊比例</i></b></td>
                        </tr>

                        @foreach($dialogs as $field=>$dialog)
                        <tr class="t2">
                            <td>
                                <center><a href="javascript:void(0);" onclick="msgbox(this,500);" url="stat_dia.asp?act=stat_s_uid&amp;aid=4&amp;to=2017-6"><i>{{ $field }}</i></a></center>
                            </td>
                            <td>
                                <center>
                                    <center>{{ $dialog['all_count'] }}</center>
                                </center>
                            </td>
                            <td>
                                <center>{{ $dialog['book_count'] }}</center>
                            </td>
                            <td>
                                <center>{{ $dialog['arrive'] }}</center>
                            </td>
                            <td>
                                <center>{{ percent($dialog['book_count'], $dialog['all_count'],'normal', '2') }}</center>
                            </td>
                            <td>
                                <center>{{ percent($dialog['arrive'], $dialog['book_count'],'normal', '2') }}</center>
                            </td>
                            <td>
                                <center>{{ percent($dialog['arrive'], $dialog['all_count'],'normal', '2') }}</center>
                            </td>
                            <td>
                                <div class="pers">
                                    <div class="per" style="min-width:10%;width:{{ percent($dialog['book_count'], $total['book_count'],'ceil') }}" title="{{ percent($dialog['book_count'], $total['book_count'],'ceil') }}"><span>{{ percent($dialog['book_count'], $total['book_count'],'ceil') }}</span></div>
                                </div>
                                <div class="perts">
                                    <div class="pert" style="min-width:10%;width:{{ percent($dialog['arrive'], $total['arrive'],'ceil') }} " title="{{ percent($dialog['arrive'], $total['arrive'],'ceil') }}"><span class="persize">{{ percent($dialog['arrive'], $total['arrive'],'ceil') }}</span></div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>