<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CallBackController;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Consult;
use App\Models\Doctor;

/**
 * 预约统计模块 
 * 单独将本模块列在一个控制器 主要是因为如果把功能写在一个方法里面  耦合高 逻辑复杂 代码结构不够清晰
 * 单独列出每个方法  有助于解耦 后期迭代方便
 * 沿用js的逻辑 
 * 
 * 但是如果放在多个方法里面  那么将会有很多重复代码
 */
class StatisticsController extends Controller
{
    
    public function index()
    {
        $data =  Appointment::all()->toArray();
        $count = array_count_values(array_column($data, 'is_hospital'));
        $total['arrive'] = isset($count['1']) ? $count['1'] : '0';
        $total['un_arrive'] = isset($count['0']) ? $count['0'] : '0';
        $total['all_count'] = count($data);
        $key = 'admin_id';

        list($diseases, $doctors, $users, $ways) = array_values(getAuxiliary());
        foreach ($data  as &$item) {
            $item['dis'] = isset($diseases[$item['dis']]) ? $diseases[$item['dis']] : '未知';
            $item['admin_id'] = isset($users[$item['admin_id']]) ? $users[$item['admin_id']] : '未知'; 
            $item['way'] = isset($ways[$item['way']])? $ways[$item['way']] : '未知';
            $item['gender'] = $item['gender'] == '1' ? '男' : '女'; 
            list($item['province'], $item['city'], $item['town']) = 
                array_values(CallBackController::area($item['province']-1,$item['city']-1,$item['town']-1));
        }
        $data = reduceArr($data, $key);
        $data_arr = [];
        foreach ($data as $field => $item) {
            if(!isset($data_arr[$field]['arrive'])) $data_arr[$field]['arrive'] = 0;
            if(!isset($data_arr[$field]['un_arrive'])) $data_arr[$field]['un_arrive'] = 0;
            if(!isset($data_arr[$field]['all_count'])) $data_arr[$field]['all_count'] = 0;
            foreach ($item as $v) {
                $data_arr[$field]['all_count'] += 1;
                if ($v['is_hospital'] == '1') {
                    $data_arr[$field]['arrive'] += 1;

                } else {
                    $data_arr[$field]['un_arrive'] += 1;
                }
            }
        }
        unset($data);

        return view('Book.statistics.index', ['total'=>$total, 'data_arr'=>$data_arr]);
    }



}
