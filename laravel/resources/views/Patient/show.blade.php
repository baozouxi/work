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
            <td><i>病历号：</i></td>
            <td>{{ $data->medical_num }}</td>
        </tr>
        <tr class="t2">
            <td><i>年龄：</i></td>
            <td>{{ $data->age }}</td>
            <td><i>性别：</i></td>
            <td>{{ $data->gender == '1' ? '男' : '女' }}</td>
            <td><i>手机：</i></td>
            <td>{{ $data->phone }}</td>
        </tr>
        <tr class="t1">
            <td><i>地区：</i></td>
            <td>{{ $data->city }} {{ $data->town }}</td>
            <td><i>媒介：</i></td>
            <td>电视广告</td>
            <td><i>途径：</i></td>
            <td>其它</td>
        </tr>
        <tr class="t2">
            <td><i>科室：</i></td>
            <td>肾病</td>
            <td><i>病种：</i></td>
            <td>肾病综合征</td>
            <td><i>消费：</i></td>
            <td>0</td>
        </tr>
        <tr class="t1">
            <td><i>预约医生：</i></td>
            <td><span>-</span></td>
            <td><i>就诊医生：</i></td>
            <td>赵中献</td>
            <td><i>就诊时间：</i></td>
            <td>05-18 16:34</td>
        </tr>
        <tr class="t2">
            <td><i>回访时间：</i></td>
            <td>05-18 16:34</td>
            <td><i>录入员：</i></td>
            <td>一株</td>
            <td><i>取消跟踪：</i></td>
            <td><span>否</span></td>
        </tr>
        <tr class="t1">
            <td colspan="6">撒大师阿斯顿阿萨哒鞋子擦啊大师大师的阿斯顿啊实打实大师大师的啊实打实的阿斯顿啊实打实大师哒鞋子擦阿斯顿</td>
        </tr>
    </tbody>
</table>
