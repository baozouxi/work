<!--导航-->
<div class="guide">
    <ul class="left">
        <li><span class="icon">Ă</span><a href="javascript:void(0);" onclick="getChange(0);fastH(this,'main')" url="main.asp?s=1">首页</a><span class="ider">&gt;</span></li>
        <li>用户组管理</li>
    </ul>
</div>
<div id="wrap" class="wrap">
    <!--整体内容-->
    <div id="container" class="container">
        <div class="top">
            <h3 class="left"><span class="icon">ŷ</span>新增用户组</h3>
            <p class="nlink right"><a href="javascript:void(0);" onclick="fastH(this,'main')" url="{{ route('role.index') }}" id="ref_url" title="返回" class="config"><span class="icon">ĭ</span>返回</a></p>
        </div>
        <div id="box" class="box">
            <form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{{ route('role.store') }}');">
                <label class="inline">用户组名称/类型</label>
                <input type="text" name="name" id="name" class="input" value="" style="width:195px;" autocomplete="off" disableautocomplete="" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';"><span></span>
                <select class="select" name="role" id="role" style="width:80px;">
                    <option value="0">不指定</option>
                    <option value="1">咨询</option>
                    <option value="2">门诊</option>
                    <option value="3">医生</option>
                    <option value="4">挂号</option>
                </select>
                {{ csrf_field() }}
                <label class="inline"></label>
                <table cellspacing="1" cellpadding="0">

                    <tbody id="tablebg">
                        
                        <tr class="t1">
                               <td><center><i><em>导航权限</em></i></center></td>
                        </tr>
                        <tr class="t2">
                            <td>
                            @foreach($nav as $key => $navItem)
                                <input name="nav[]" id="nav{{$key}}" type="checkbox" value="{{ $navItem->id }}">
                                <label for="nav{{$key}}">{{ $navItem['name'] }}</label>
                            @endforeach
                            </td>

                        </tr>
                        

                        <tr class="t1">
                            <td><center><i><em>页面节点权限</em></i></center></td>
                        </tr>
                            

                        <tr class="t1">
                            <td><i><b>患者列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="turn_list" type="checkbox" value="turn_list">
                                <label for="turn_list">患者列表</label>
                                <input name="manage[]" id="turn_add" type="checkbox" value="turn_add">
                                <label for="turn_add">增加患者</label>
                                <input name="manage[]" id="turn_edit" type="checkbox" value="turn_edit">
                                <label for="turn_edit">编辑患者</label>
                                <input name="manage[]" id="turn_del" type="checkbox" value="turn_del">
                                <label for="turn_del">删除患者</label>
                                <input name="manage[]" id="turn_view" type="checkbox" value="turn_view">
                                <label for="turn_view"><u>患者属性</u></label>
                                <input name="manage[]" id="turn_user" type="checkbox" value="turn_user">
                                <label for="turn_user"><i>全部可见</i></label>
                                <input name="manage[]" id="turn_all" type="checkbox" value="turn_all">
                                <label for="turn_all"><em>全部可编</em></label>
                                <input name="manage[]" id="turn_excel" type="checkbox" value="turn_excel">
                                <label for="turn_excel">导出数据</label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>患者回访列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="reply_list" type="checkbox" value="reply_list">
                                <label for="reply_list">回访列表</label>
                                <input name="manage[]" id="reply_add" type="checkbox" value="reply_add">
                                <label for="reply_add">增加回访</label>
                                <input name="manage[]" id="reply_edit" type="checkbox" value="reply_edit">
                                <label for="reply_edit">编辑回访</label>
                                <input name="manage[]" id="reply_del" type="checkbox" value="reply_del">
                                <label for="reply_del">删除回访</label>
                                <input name="manage[]" id="reply_user" type="checkbox" value="reply_user">
                                <label for="reply_user"><i>全部可见</i></label>
                                <input name="manage[]" id="reply_all" type="checkbox" value="reply_all">
                                <label for="reply_all"><em>全部可编</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>患者消费列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="take_list" type="checkbox" value="take_list">
                                <label for="take_list">消费列表</label>
                                <input name="manage[]" id="take_add" type="checkbox" value="take_add">
                                <label for="take_add">增加消费</label>
                                <input name="manage[]" id="take_edit" type="checkbox" value="take_edit">
                                <label for="take_edit">编辑消费</label>
                                <input name="manage[]" id="take_del" type="checkbox" value="take_del">
                                <label for="take_del">删除消费</label>
                                <input name="manage[]" id="take_user" type="checkbox" value="take_user">
                                <label for="take_user"><i>全部可见</i></label>
                                <input name="manage[]" id="take_all" type="checkbox" value="take_all">
                                <label for="take_all"><em>全部可编</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>电话列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="tel_list" type="checkbox" value="tel_list">
                                <label for="tel_list">电话列表</label>
                                <input name="manage[]" id="tel_add" type="checkbox" value="tel_add">
                                <label for="tel_add">增加电话</label>
                                <input name="manage[]" id="tel_edit" type="checkbox" value="tel_edit">
                                <label for="tel_edit">编辑电话</label>
                                <input name="manage[]" id="tel_del" type="checkbox" value="tel_del">
                                <label for="tel_del">删除电话</label>
                                <input name="manage[]" id="tel_user" type="checkbox" value="tel_user">
                                <label for="tel_user"><i>全部可见</i></label>
                                <input name="manage[]" id="tel_all" type="checkbox" value="tel_all">
                                <label for="tel_all"><em>全部可编</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>咨询列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="cons_list" type="checkbox" value="cons_list">
                                <label for="cons_list">咨询列表</label>
                                <input name="manage[]" id="cons_add" type="checkbox" value="cons_add">
                                <label for="cons_add">增加咨询</label>
                                <input name="manage[]" id="cons_edit" type="checkbox" value="cons_edit">
                                <label for="cons_edit">编辑咨询</label>
                                <input name="manage[]" id="cons_del" type="checkbox" value="cons_del">
                                <label for="cons_del">删除咨询</label>
                                <input name="manage[]" id="cons_user" type="checkbox" value="cons_user">
                                <label for="cons_user"><i>全部可见</i></label>
                                <input name="manage[]" id="cons_all" type="checkbox" value="cons_all">
                                <label for="cons_all"><em>全部可编</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>回拨列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="call_list" type="checkbox" value="call_list">
                                <label for="call_list">回拨列表</label>
                                <input name="manage[]" id="call_edit" type="checkbox" value="call_edit">
                                <label for="call_edit">编辑回拨</label>
                                <input name="manage[]" id="call_del" type="checkbox" value="call_del">
                                <label for="call_del">删除回拨</label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>对话列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="dia_list" type="checkbox" value="dia_list">
                                <label for="dia_list">对话列表</label>
                                <input name="manage[]" id="dia_add" type="checkbox" value="dia_add">
                                <label for="dia_add">增加对话</label>
                                <input name="manage[]" id="dia_edit" type="checkbox" value="dia_edit">
                                <label for="dia_edit">编辑对话</label>
                                <input name="manage[]" id="dia_del" type="checkbox" value="dia_del">
                                <label for="dia_del">删除对话</label>
                                <input name="manage[]" id="dia_user" type="checkbox" value="dia_user">
                                <label for="dia_user"><i>全部可见</i></label>
                                <input name="manage[]" id="dia_all" type="checkbox" value="dia_all">
                                <label for="dia_all"><em>全部可编</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>竞价列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="rank_list" type="checkbox" value="rank_list">
                                <label for="rank_list">竞价列表</label>
                                <input name="manage[]" id="rank_add" type="checkbox" value="rank_add">
                                <label for="rank_add">增加竞价</label>
                                <input name="manage[]" id="rank_edit" type="checkbox" value="rank_edit">
                                <label for="rank_edit">编辑竞价</label>
                                <input name="manage[]" id="rank_del" type="checkbox" value="rank_del">
                                <label for="rank_del">删除竞价</label>
                                <input name="manage[]" id="rank_view" type="checkbox" value="rank_view">
                                <label for="rank_view"><u>竞价属性</u></label>
                                <input name="manage[]" id="rank_user" type="checkbox" value="rank_user">
                                <label for="rank_user"><i>全部可见</i></label>
                                <input name="manage[]" id="rank_all" type="checkbox" value="rank_all">
                                <label for="rank_all"><em>全部可编</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>竞价分类</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="auc_list" type="checkbox" value="auc_list">
                                <label for="auc_list">分类列表</label>
                                <input name="manage[]" id="auc_add" type="checkbox" value="auc_add">
                                <label for="auc_add">增加分类</label>
                                <input name="manage[]" id="auc_edit" type="checkbox" value="auc_edit">
                                <label for="auc_edit">编辑分类</label>
                                <input name="manage[]" id="auc_del" type="checkbox" value="auc_del">
                                <label for="auc_del"><em>删除合并分类</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>病种分类</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="dis_list" type="checkbox" value="dis_list">
                                <label for="dis_list">病种列表</label>
                                <input name="manage[]" id="dis_add" type="checkbox" value="dis_add">
                                <label for="dis_add">增加病种</label>
                                <input name="manage[]" id="dis_edit" type="checkbox" value="dis_edit">
                                <label for="dis_edit">编辑病种</label>
                                <input name="manage[]" id="dis_del" type="checkbox" value="dis_del">
                                <label for="dis_del"><em>删除合并病种</em></label>
                                <input name="manage[]" id="dis_sms" type="checkbox" value="dis_sms">
                                <label for="dis_sms"><i>短信模版</i></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>科室分类</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="dep_list" type="checkbox" value="dep_list">
                                <label for="dep_list">诊室列表</label>
                                <input name="manage[]" id="dep_add" type="checkbox" value="dep_add">
                                <label for="dep_add">增加诊室</label>
                                <input name="manage[]" id="dep_edit" type="checkbox" value="dep_edit">
                                <label for="dep_edit">编辑诊室</label>
                                <input name="manage[]" id="dep_del" type="checkbox" value="dep_del">
                                <label for="dep_del"><em>删除合并诊室</em></label>
                                <input name="manage[]" id="dep_sms" type="checkbox" value="dep_sms">
                                <label for="dep_sms"><i>短信模版</i></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>途径分类</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="way_list" type="checkbox" value="way_list">
                                <label for="way_list">途径列表</label>
                                <input name="manage[]" id="way_add" type="checkbox" value="way_add">
                                <label for="way_add">增加途径</label>
                                <input name="manage[]" id="way_edit" type="checkbox" value="way_edit">
                                <label for="way_edit">编辑途径</label>
                                <input name="manage[]" id="way_del" type="checkbox" value="way_del">
                                <label for="way_del"><em>删除合并途径</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>媒介分类</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="ads_list" type="checkbox" value="ads_list">
                                <label for="ads_list">媒介列表</label>
                                <input name="manage[]" id="ads_add" type="checkbox" value="ads_add">
                                <label for="ads_add">增加媒介</label>
                                <input name="manage[]" id="ads_edit" type="checkbox" value="ads_edit">
                                <label for="ads_edit">编辑媒介</label>
                                <input name="manage[]" id="ads_del" type="checkbox" value="ads_del">
                                <label for="ads_del"><em>删除合并媒介</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>站点分类</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="website_list" type="checkbox" value="website_list">
                                <label for="website_list">站点列表</label>
                                <input name="manage[]" id="website_add" type="checkbox" value="website_add">
                                <label for="website_add">增加站点</label>
                                <input name="manage[]" id="website_edit" type="checkbox" value="website_edit">
                                <label for="website_edit">编辑站点</label>
                                <input name="manage[]" id="website_del" type="checkbox" value="website_del">
                                <label for="website_del"><em>删除合并站点</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>来源分类</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="source_list" type="checkbox" value="source_list">
                                <label for="source_list">来源列表</label>
                                <input name="manage[]" id="source_add" type="checkbox" value="source_add">
                                <label for="source_add">增加来源</label>
                                <input name="manage[]" id="source_edit" type="checkbox" value="source_edit">
                                <label for="source_edit">编辑来源</label>
                                <input name="manage[]" id="source_del" type="checkbox" value="source_del">
                                <label for="source_del"><em>删除合并来源</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>用户列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="user_list" type="checkbox" value="user_list">
                                <label for="user_list">用户列表</label>
                                <input name="manage[]" id="user_add" type="checkbox" value="user_add">
                                <label for="user_add">增加用户</label>
                                <input name="manage[]" id="user_edit" type="checkbox" value="user_edit">
                                <label for="user_edit">编辑用户</label>
                                <input name="manage[]" id="user_del" type="checkbox" value="user_del">
                                <label for="user_del"><em>删除用户</em></label>
                                <input name="manage[]" id="user_cid" type="checkbox" value="user_cid">
                                <label for="user_cid"><i>科室权限（可见范围）</i></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>群组列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="group_list" type="checkbox" value="group_list">
                                <label for="group_list">群组列表</label>
                                <input name="manage[]" id="group_add" type="checkbox" value="group_add">
                                <label for="group_add">增加群组</label>
                                <input name="manage[]" id="group_edit" type="checkbox" value="group_edit">
                                <label for="group_edit">编辑群组</label>
                                <input name="manage[]" id="group_del" type="checkbox" value="group_del">
                                <label for="group_del"><em>删除群组</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>黑名单列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="black_list" type="checkbox" value="black_list">
                                <label for="black_list">黑名单列表</label>
                                <input name="manage[]" id="black_add" type="checkbox" value="black_add">
                                <label for="black_add">增加黑名单</label>
                                <input name="manage[]" id="black_edit" type="checkbox" value="black_edit">
                                <label for="black_edit">编辑黑名单</label>
                                <input name="manage[]" id="black_del" type="checkbox" value="black_del">
                                <label for="black_del"><em>删除黑名单</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>上传列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="file_list" type="checkbox" value="file_list">
                                <label for="file_list">上传记录</label>
                                <input name="manage[]" id="file_user" type="checkbox" value="file_user">
                                <label for="file_user">全部可见</label>
                                <input name="manage[]" id="file_clear" type="checkbox" value="file_clear">
                                <label for="file_clear">文件清理</label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>日志列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="log_list" type="checkbox" value="log_list">
                                <label for="log_list">日志记录</label>
                                <input name="manage[]" id="log_user" type="checkbox" value="log_user">
                                <label for="log_user"><i>全部可见</i></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>短信列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="sms_list" type="checkbox" value="sms_list">
                                <label for="sms_list">短信列表</label>
                                <input name="manage[]" id="sms_add" type="checkbox" value="sms_add">
                                <label for="sms_add">发送短信</label>
                                <input name="manage[]" id="sms_del" type="checkbox" value="sms_del">
                                <label for="sms_del">删除短信</label>
                                <input name="manage[]" id="sms_group" type="checkbox" value="sms_group">
                                <label for="sms_group"><em>短信群发</em></label>
                                <input name="manage[]" id="sms_user" type="checkbox" value="sms_user">
                                <label for="sms_user"><i>全部可见</i></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>代码列表</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="code_list" type="checkbox" value="code_list">
                                <label for="code_list">代码调用</label>
                                <input name="manage[]" id="code_key" type="checkbox" value="code_key">
                                <label for="code_key">秘钥生成</label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>统计功能</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="stat_res" type="checkbox" value="stat_res">
                                <label for="stat_res">预约统计</label>
                                <input name="manage[]" id="stat_turn" type="checkbox" value="stat_turn">
                                <label for="stat_turn">患者统计</label>
                                <input name="manage[]" id="stat_dia" type="checkbox" value="stat_dia">
                                <label for="stat_dia">对话统计</label>
                                <input name="manage[]" id="stat_rank" type="checkbox" value="stat_rank">
                                <label for="stat_rank">竞价统计</label>
                                <input name="manage[]" id="stat_take" type="checkbox" value="stat_take">
                                <label for="stat_take"><em>消费统计</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>报表功能</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="stat_rep_res" type="checkbox" value="stat_rep_res">
                                <label for="stat_rep_res">预约报表</label>
                                <input name="manage[]" id="stat_rep_turn" type="checkbox" value="stat_rep_turn">
                                <label for="stat_rep_turn">患者报表</label>
                                <input name="manage[]" id="stat_rep_dia" type="checkbox" value="stat_rep_dia">
                                <label for="stat_rep_dia">对话报表</label>
                                <input name="manage[]" id="stat_rep_rank" type="checkbox" value="stat_rep_rank">
                                <label for="stat_rep_rank">竞价报表</label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>导航菜单管理</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="nav_res" type="checkbox" value="nav_res">
                                <label for="nav_res">预约</label>
                                <input name="manage[]" id="nav_turn" type="checkbox" value="nav_turn">
                                <label for="nav_turn">患者</label>
                                <input name="manage[]" id="nav_dia" type="checkbox" value="nav_dia">
                                <label for="nav_dia">对话</label>
                                <input name="manage[]" id="nav_rank" type="checkbox" value="nav_rank">
                                <label for="nav_rank">竞价</label>
                                <input name="manage[]" id="nav_user" type="checkbox" value="nav_user">
                                <label for="nav_user">用户</label>
                                <input name="manage[]" id="nav_setting" type="checkbox" value="nav_setting">
                                <label for="nav_setting"><em>设置</em></label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>快速查看数据</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="view_all" type="checkbox" value="view_all">
                                <label for="view_all">全部数据</label>
                                <input name="manage[]" id="view_rank" type="checkbox" value="view_rank">
                                <label for="view_rank">竞价数据</label>
                                <input name="manage[]" id="view_mom" type="checkbox" value="view_mom">
                                <label for="view_mom">环比数据</label>
                                <input name="manage[]" id="view_top" type="checkbox" value="view_top">
                                <label for="view_top">排行数据</label>
                                <input name="manage[]" id="view_list" type="checkbox" value="view_list">
                                <label for="view_list">今日列表</label>
                                <input name="manage[]" id="view_rep" type="checkbox" value="view_rep">
                                <label for="view_rep">昨日报表</label>
                                <input name="manage[]" id="view_admin" type="checkbox" value="view_admin">
                                <label for="view_admin">报表设置</label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>关联管理</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="bind_main" type="checkbox" value="bind_main">
                                <label for="bind_main">关联中心</label>
                                <input name="manage[]" id="bind_list" type="checkbox" value="bind_list">
                                <label for="bind_list">关联列表</label>
                                <input name="manage[]" id="bind_add" type="checkbox" value="bind_add">
                                <label for="bind_add">新增关联</label>
                                <input name="manage[]" id="bind_edit" type="checkbox" value="bind_edit">
                                <label for="bind_edit">关联编辑</label>
                                <input name="manage[]" id="bind_del" type="checkbox" value="bind_del">
                                <label for="bind_del">关联删除</label>
                            </td>
                        </tr>
                        <tr class="t1">
                            <td><i><b>其它管理</b></i></td>
                        </tr>
                        <tr class="t2">
                            <td>
                                <input name="manage[]" id="user_pass" type="checkbox" value="user_pass">
                                <label for="user_pass">修改信息</label>
                                <input name="manage[]" id="user_power" type="checkbox" value="user_power">
                                <label for="user_power">查看权限</label>
                                <input name="manage[]" id="user_upload" type="checkbox" value="user_upload">
                                <label for="user_upload">上传文件</label>
                                <input name="manage[]" id="file_down" type="checkbox" value="file_down">
                                <label for="file_down">下载文件</label>
                                <input name="manage[]" id="diy_time" type="checkbox" value="diy_time">
                                <label for="diy_time">自定义预约到诊时间</label>
                                <input name="manage[]" id="setting" type="checkbox" value="setting">
                                <label for="setting"><i>系统设置</i></label>
                                <input name="manage[]" id="setting_vip" type="checkbox" value="setting_vip">
                                <label for="setting_vip"><em>高级设置</em></label>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <label class="inline"></label>
                <input type="hidden" name="back_url" id="back_url" value="{{ route('role.index') }}">
                <label class="inline"></label>
                <div name="msg" id="msg" style="width:370px;" class="msg">请稍后..</div>
                <label class="inline"></label>
                <button type="submit" id="submit" class="submit"><span class="icon">Ż</span>保存</button>
                <button type="reset" class="button"><span class="icon">ň</span>重置</button>
                <button type="button" onclick="To($('back_url').value,'main');" class="button"><span class="icon">ĭ</span>返回</button>
            </form>
            <input type="hidden" name="this_url" id="this_url" value="{{ route('role.create') }}">
        </div>
    </div>
</div>
