<table cellspacing="1" cellpadding="0">
    <thead>
        <tr>
            <th colspan="6">
                <center>{{ $data->name }}的详细资料</center>
            </th>
        </tr>
    </thead>
    <tbody id="table_bg">
        <tr class="t1">
            <td><i>姓名：</i></td>
            <td>{{ $data->name }}</td>
            <td><i>编号：</i></td>
            <td>{{ $data->id }}</td>
            <td><i>预约号：</i></td>
            <td>{{ $data->id }}</td>
        </tr>
        <tr class="t2">
            <td><i>年龄：</i></td>
            <td>{{ $data->age }}</td>
            <td><i>性别：</i></td>
            <td>{{ $data->gender == 1 ? '男' : '女' }}</td>
            <td><i>病历号：</i></td>
            <td><span>-</span></td>
        </tr>
        <tr class="t1">
            <td><i>QQ：</i></td>
            <td><span>{{ $data->qq or '-' }}</span></td>
            <td><i>微信：</i></td>
            <td><span>{{ $data->weixin or '-' }}</span></td>
            <td><i>手机：</i></td>
            <td>{{ $data->phone or '-' }}</td>
        </tr>
        <tr class="t2">
            <td><i>职业：</i></td>
            <td><span>{{ $data->job or '-' }}</span></td>
            <td><i>地区：</i></td>
            <td>金牛区</td>
            <td><i>地址：</i></td>
            <td><span>{{ $data->address or '-' }}</span></td>
        </tr>
        <tr class="t1">
            <td><i>科室：</i></td>
            <td>肾病</td>
            <td><i>病种：</i></td>
            <td>肾病综合征</td>
            <td><i>途径：</i></td>
            <td>PC商务通</td>
        </tr>
        <tr class="t2">
            <td><i>预约医生：</i></td>
            <td><span>-</span></td>
            <td><i>就诊医生：</i></td>
            <td><span>-</span></td>
            <td><i>就诊时间：</i></td>
            <td><span>-</span></td>
        </tr>
        <tr class="t1">
            <td><i>录入时间：</i></td>
            <td>{{ date('m-d H:i', strtotime($data->add_time)) }}</td>
            <td><i>预约时间：</i></td>
            <td>{{ date('m-d H:i', strtotime($data->postdate)) }}</td>
            <td><i>提醒短信：</i></td>
            <td><span>未发</span></td>
        </tr>
        <tr class="t2">
            <td><i>取消跟踪：</i></td>
            <td><span>否</span></td>
            <td><i>回访次数：</i></td>
            <td>0</td>
            <td><i>最后回访：</i></td>
            <td><span>-</span></td>
        </tr>
        <tr class="t1">
            <td><i>录入员：</i></td>
            <td>医患通</td>
            <td><i>来源站点：</i></td>
            <td>无</td>
            <td><i>来源信息：</i></td>
            <td>无</td>
        </tr>
        <tr class="t1">
            <td><i>关键字：</i></td>
            <td colspan="5"><span>-</span></td>
        </tr>
        <tr class="t1">
            <td colspan="6">{{ $data->content }}</td>
        </tr>
    </tbody>
</table>
