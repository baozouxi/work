<?php

namespace App\Http\Controllers\RBAC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RbacController extends Controller
{
	

	//根据传入节点名称，检查权限
	static public function check_node($node)
	{
		return true;
		if(session('role_id') == '0') return true;
		$acc_arr = session('acc', []);
		if(self::check_all($node,$acc_arr)) return true;
		if(in_array($node, $acc_arr)) return true;
		return false;
	}
 

	static public function check_all($node, $acc_arr)
	{
		$node = explode('_', $node)['0'];
		$node_all = $node.'_all';
		if(in_array($node_all, $acc_arr)) return true;
		return false;
	}

	static public function check_nav($nav)
	{
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == '1') return true;
		//用户权限数组
		$current_acc = [];
		if($_SESSION['acc'])  $current_acc = $_SESSION['acc'];
		if(self::check_all($nav,$current_acc))  return true;
		if(in_array($nav, $current_acc)) return ture;
		return false;
	}




}
