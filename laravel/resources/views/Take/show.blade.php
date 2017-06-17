
@include('patient.track.info')

<table cellspacing="1" cellpadding="0">
    <thead>
        <tr>
            <th width="120">
                <center>时间</center>
            </th>
            <th width="70">
                <center>医生</center>
            </th>
            <th width="70">
                <center>药量</center>
            </th>
            <th width="70">
                <center>检查</center>
            </th>
            <th width="70">
                <center>药品</center>
            </th>
            <th width="70">
                <center>治疗</center>
            </th>
            <th width="70">
                <center>住院</center>
            </th>
            <th width="70">
                <center>总额</center>
            </th>
            <th width="*">备注</th>
            <th width="90">
                <center>操作</center>
            </th>
        </tr>
    </thead>
    <tbody id="tablebg">
    @foreach($takes as $key => $item)
        @if(is_int($key/2))
            <tr class="t1">
        @else
            <tr class="t2">
        @endif
            <td>
                <center>{{ formatDate($item->add_time) }}</center>
            </td>
            <td>
                <center><i>赵中献</i></center>
            </td>
            <td>
                <center>{{ $item->dose }}</center>
            </td>
            <td>
                <center>{{ $item->check_cost }}</center>
            </td>
            <td>
                <center>{{ $item->drug_cost }}</center>
            </td>
            <td>
                <center>{{ $item->treatment_cost }}</center>
            </td>
            <td>
                <center>{{ $item->hospitalization_cost }}</center>
            </td>
            <td>
                <center>{{ $item->check_cost+$item->drug_cost+$item->treatment_cost+$item->hospitalization_cost }}</center>
            </td>
            <td>{{ $item->content }}</td>
            <td>
                <center>一株</center>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

