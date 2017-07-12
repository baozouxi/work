<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nav;
use App\Models\RoleWithNav;

class IndexController extends Controller
{
    
	public function index(Request $req)
	{		

        /**
        * 根据导航权限数组 取出对应导航数组
        */
        $role_id = $req->session()->get('role_id');
        $acc_nav = RoleWithNav::where('role_id', $role_id)->first(['nodes']);
        $acc_nav = unserialize($acc_nav->nodes);
        $nav_arr = Nav::whereIn('id', $acc_nav)->where('is_use', '1')->orderBy('sort','desc')->get()->toArray();
        $role_id = '0';
        if($role_id == '0') $nav_arr = Nav::orderBy('sort','desc')->get()->toArray();  //判断是否为超级管理员 取出所有导航
   	    $nav_reduce = array_column($nav_arr, null, 'id');
        foreach ($nav_reduce as $key => $navItem) {
          if( ($navItem['parent_id'] != '0') && (isset($nav_reduce[$navItem['parent_id']])) ) {
              $nav_reduce[$navItem['parent_id']]['nav_child'][] = $navItem;
              unset($nav_reduce[$key]);
          }
        }
        
        $nav_setting_arr = [];
        foreach ($nav_reduce as $id => $reduceItem) {
            if ($reduceItem['is_setting'] == '1') {
                $nav_setting_arr[$id] = $reduceItem;
                unset($nav_reduce[$id]);
            }
        }

   	    return view('index', ['nav'=>$nav_reduce, 'setting_nav' => $nav_setting_arr]);
   	}

 }

