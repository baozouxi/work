<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Consult;

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
    
    public function index(Request $req)
    {
    	$date = date('Y-m-d', time());
    	$way = 'admin_id';
    	if($req->has('date')) $date = $req->date;
    	$monthStart = date('Y-m-01', strtotime($date));
    	$monthEnd = date('Y-m-d', strtotime("last day of $monthStart"));
    	$data = Appointment::whereBetween('postdate', [$monthStart, $monthEnd])->get()->toArray();
    	$consult_count = Consult::whereBetween('add_time', [$monthStart, $monthEnd])->where('status', '!=', '0')->count();
    	//判断传过来的way是否合法
    	if (!empty($data) && array_search($req->way, array_keys($data['0'])))  $way = $req->way;

    	//数据统计
    	$total['app_sum'] = count($data);
    	$total['patient_sum'] = 0;
    	$total['consult_sum'] = $consult_count;
    	$data_arr = array();
    	foreach ($data as $item) { 
    		if (!isset($data_arr[$item[$way]]['app_sum'])) {
    			$data_arr[$item[$way]]['app_sum'] = 0;	
    		} 
 
    		$data_arr[$item[$way]]['app_sum'] += 1;	
    		

    		if (!isset($data_arr[$item[$way]]['patient_sum'])) $data_arr[$item[$way]]['patient_sum'] = 0;
    		
    		if ($item['is_hospital'] == '1') {
    			$data_arr[$item[$way]]['patient_sum'] += 1;
    			$total['patient_sum'] += 1;
    		}
    	}


   		//传递引用 
    	foreach ($data_arr as &$item) {
    		$item['un_arrive'] = $item['app_sum'] - $item['patient_sum'];
    		$item['arrive'] = $total['patient_sum'] == '0' ? '0' : ceil($item['patient_sum']/$item['app_sum']*100);
    		$item['app_per'] = 	$item['app_sum']  == '0' ? '0' : ceil($item['app_sum']/$total['app_sum']*100);
    		$item['arrive_per'] = 	$item['app_sum']  == '0' ? '0' : ceil($item['patient_sum']/$total['app_sum']*100);
	  	}

	  	$total['arrive_per'] = $total['app_sum'] == '0' ? '0' : ceil($total['patient_sum']/$total['app_sum']*100);
    	$total['un_arrive'] = $total['app_sum'] - $total['patient_sum']; 
	  	unset($data);
	  	dd($data_arr);

//    	return view('Book.Statistics.index', ['data' => $data_arr, 'total'=>$total]); 

    }


    /**
     * 根据传入键值重新组织数组
     * @param  [string] $key  [键值]
     * @param  [array] $data [待整理数组]
     * @return [array]       [整理后数组]
     */
    private function formatData($key, $data)
    {	
    	$tem_arr = [];
    	foreach ($data as $item) {
    		$tem_arr[$item[$key]][] = $item;	
    	}
    	return $tem_arr;
    }	


}