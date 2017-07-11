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
