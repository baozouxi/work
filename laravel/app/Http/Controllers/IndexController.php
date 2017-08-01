<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nav;
use App\Models\Patient;
use App\Models\RoleWithNav;
use Excel;

class IndexController extends Controller
{
    /**
    * 根据导航权限数组 取出对应导航数组
    */
	public function index(Request $req)
	{		  

        // $cookie = "ASPSESSIONIDQADSBSCR:OEALPHBAEMADCMAGDGOLMJOE; login%5F4%5F171%2E88%2E179%2E245=; his%5Fjj%5Fgk=ECEDE42691C51FC2771ADEFBA491D4FC";

        // $ch = curl_init('http://test.ehis.cc/res.asp?s=1&m=res&req=0.19531342590355516');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_COOKIE,  $cookie);

        // $data = curl_exec($ch);
   

        // $pattern = '/<th\swidth="(\d+)"><center><a.*>(.*)<\/a><\/center><\/th>/U';
        // preg_match_all($pattern, $data, $match);
        // unset($match['0']);
        // $tempArr = [];
        // foreach ($match['1'] as $key => $item) {
        //     $tempArr[$key]['name'] = $item;
        //     $tempArr[$key]['width'] = $match['2'][$key];
        // }
        // echo '<pre>';
        // print_r($tempArr);

        $role_id = $req->session()->get('role_id');
        $acc_nav = RoleWithNav::where('role_id', $role_id)->first(['nodes']);
        $acc_nav = isset($acc_nav->nodes) ?unserialize($acc_nav->nodes) : [];
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

        if($req->s == '1') return view('indexWithoutHeader', ['nav'=>$nav_reduce, 'setting_nav' => $nav_setting_arr]);

   	    return view('index', ['nav'=>$nav_reduce, 'setting_nav' => $nav_setting_arr]);
   	}





 }

