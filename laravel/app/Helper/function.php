<?php

/**
 * 获取现在是格式化后的现在时间
 * @return [type] [description]
 */
function getNow()
{
	return date('Y-m-d H:i:s');
}

/**
 * 替换地方
 * @param  [type] $area    [description]
 * @param  [type] $replace [description]
 * @return [type]          [description]
 */
function replaceArea($area, $replace)
{
	foreach ($area as $field => $val) {
		$replace->$field = $val;
	}
	return $replace;
}

/**
 * 格式化日期 并检查日期格式 
 * @param  [date] $date   [需要格式化的日期]
 * @param  string $patten [description]
 * @return [type]         [description]
 */
function formatDate($date, $patten='Y-m-d H:i')
{

	if(strtotime(date('Y-m-d H:i:s', strtotime($date))) !== strtotime($date)) return false;
	$date = strtotime($date);
	return date($patten, $date);
}


function getGender($gender)
{
	return (int)$gender == '1' ? '男' : '女' ; 
}


/**
 * 返回字符串
 * @param  [type] $msg [description]
 * @return [type]      [description]
 */
function code($msg, $code='0')
{
	return ['code'=>$code, 'msg'=>$msg, 'time'=>getNow()];
}

/**
 * 检查节点权限
 * @return [boolen] [description]
 */
function check_node($node)
{
	if(\App\Http\Controllers\RBAC\RbacController::check_node($node)) return true;
	return false;
}

/**
 * 除法 并验证数据合法性
 * @param  numeric $dividend 被除数
 * @param  numeric $divisor  除数
 * @param  numeric $precision    精度
 * @return numeric          结果
 */
function divide($dividend, $divisor,$precision='2')
{
	if($divisor == 0 || !is_numeric($divisor) ) return 0;
	$result = $dividend/$divisor;
	$result = round($result, $precision);
	return $result;
}


//验证数据合法性 并返回计算后的百分比
function percent($dividend, $divisor, $mode='normal', $precision='')
{	
	$result = divide($dividend, $divisor,'10')*100;

	if($precision)  $result = round($result, (int)$precision);

	switch ($mode) {
		case 'ceil':
			$result = ceil($result);
			break;
		case 'floor':
			$result = floor($result);
		 	break;
	}

	return $result.'%';
}

//获取统计数据需要的数据，例如 医生表，病种表 并返回格式化后的数组
function getAuxiliary()
{
	$diseases = \App\Models\Disease::all()->toArray();
	$doctors = \App\Models\Doctor::all()->toArray();
	$users = \App\Models\User::all()->toArray();
	$ways =  \App\Models\Way::all()->toArray();
	$ads =  \App\Models\Ad::all()->toArray();
	$diseases = array_column($diseases, 'name', 'id');
	$doctors = array_column($doctors, 'name', 'id');
	$users = array_column($users, 'name', 'id');
	$ways = array_column($ways, 'name', 'id');
	$ads = array_column($ads, 'name', 'id');

	return array('diseases'=>$diseases, 'doctors'=>$doctors, 'users'=>$users, 'ways'=>$ways,'ads'=>$ads);
}



//根据传入键名重组数组 
function reduceArr($data, $key)
{
	$data = (array)$data;
	$temp_arr = [];
	$week = ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
	foreach ($data as $item) {
		switch ($key) {
			case 'time':
				$time_format = formatDate($item['add_time'], 'H');
				$field = $time_format.'点';
				break;
			case 'day':
				$time_format = formatDate($item['add_time'], 'j');
				$field = $time_format.'号';
				break;
			case 'week':
				$time_format = formatDate($item['add_time'], 'w');
				$field = $week[$time_format];
				break;

			case 'month':
				$time_format = formatDate($item['add_time'], 'n');
				$field =  $time_format.'月';
				break;
			case 'area':
				$field = $item['city'].'-'.$item['town'];
				break;
			case 'age':
				$field = $item[$key].'岁';
				break;
			default:
				$field = $item[$key];
				break;
		}

		$temp_arr[$field][] = $item;
	}	
	return $temp_arr;
}


/**
 * header部导航页面繁琐  封装成方法  返回对应html
 */
function guideHtml($name, $url='')
{
 
	if($url != ''){
		$url = '<a href="javascript:void(0);" onclick="fastH(this,\'main\');set_title(\'列表\');" url="'.$url.'">'.$name.'</a>
				<span class="ider">&gt;</span>';
		return '<li>'.$url.'</li>';
	} 

	return '<li><span id="guide">'.$name.'</span></li>';
}


function fileHtml($url, $name)
{
	$html = '<center class="file"><a href="javascript:void(0);" title="“'.$name.'”的咨询记录" onclick="msgbox(this,850);" url="'.$url.'"><span class="icon">Ċ</span></a></center>';
	return $html;
}


function chatLogHtml($url,$name)
{
	$html = '<center class="file"><a href="javascript:void(0);" title="“'.$name.'”的咨询记录" onclick="msgbox(this,850);" url="'.$url.'"><span class="icon">ĉ</span></a></center>';
}
