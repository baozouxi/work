<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use DB;

class ReportController extends Controller
{
    public function index()
    {
        $data = Appointment::orderBy('postdate','desc')->get(['is_hospital', 'postdate', 'id'])->toArray();
        $months = Appointment::all([DB::raw('distinct DATE_FORMAT(postdate,"%Y-%m") as postdate')]);
        $users = getAuxiliary()['users'];

        list($total, $data_after_filter) = $this->reduceArr($data);

        return view('Book.sheet', ['total' => $total, 'data_arr' => $data_after_filter, 'months'=>$months, 'users'=>$users]);
    }



    private function reduceArr($data)
    {
        $total = array();
        $is_hospital = array_filter($data, function ($v, $key) {
            if ($v['is_hospital'] == '1') {
                return $v;
            }

        }, ARRAY_FILTER_USE_BOTH);
        $total['app_sum'] = count($data);
        $total['patient_sum'] = count($is_hospital);
        //当日到
        $sql = "select DATE_FORMAT(p.add_time, '%Y-%c-%d') as add_time,p.id from patients as p";
        $sql .= " join appointments as ap on p.book_id = ap.id";
        $sql .= " where p.add_time between DATE_FORMAT(ap.postdate, '%Y-%c-%d 00:00:00') AND DATE_FORMAT(ap.postdate, '%Y-%c-%d 23:59:59');";
        $on_that_day = DB::select($sql);
        $total['on_that_day'] = count($on_that_day);
        $on_that_day = array_column($on_that_day, null, 'add_time');

        //拼装数据
        $data_arr = [];
        foreach ($data as $item) {
            $data_arr[formatDate($item['postdate'], 'Y-m-d')][] = $item;
        }
        unset($data);
        $on_that_day_arr = [];
        foreach ($on_that_day as $onItem) {
            $on_that_day_arr[formatDate($onItem->add_time, 'Y-m-d')][] = $onItem;
        }
        unset($on_that_day);
        
        //总到诊率
        $total['arrived'] = $total['app_sum'] == '0' ? '0' : ceil($total['patient_sum'] / $total['app_sum'] * 100);
        //总当日率
        $total['arrive_on_that_day'] = $total['app_sum'] == '0' ? '0' : ceil($total['on_that_day'] / $total['app_sum'] * 100);

        //统计结果 便于前台展示  通过遍历将所有数据进行整合存于另一个数组 以格式化后的日期作为数组索引
        $data_after_filter = array();
        foreach ($data_arr as $date => $onItem) {
            foreach ($onItem as $dateItem) {
                $data_after_filter[$date]['app_sum'] = count($onItem);
                if (!isset($data_after_filter[$date]['patient_sum'])) {
                    $data_after_filter[$date]['patient_sum'] = 0;
                }
                if ($dateItem['is_hospital'] == '1') {
                    $data_after_filter[$date]['patient_sum'] += 1;
                }
                if (isset($on_that_day_arr[$date])) {
                    $data_after_filter[$date]['on_that_day'] = count($on_that_day_arr[$date]);
                    continue;
                }
                $data_after_filter[$date]['on_that_day'] = 0;
            }
        }
        unset($data_arr);
        //计算当日率 到诊率
        array_walk($data_after_filter, function (&$item) {
            $item['arrived'] = $item['app_sum'] == 0 ? 0 : ceil($item['patient_sum'] / $item['app_sum'] * 100);
            $item['arrive_on_that_day'] = $item['app_sum'] == 0 ? 0 : ceil($item['on_that_day'] / $item['app_sum'] * 100);
        });
        return [$total, $data_after_filter];
    }

    public function searchByMonth(Request $req)
    {
        $data = new Appointment();
        $arr = []; //存储模版变量
        $arr['users'] = getAuxiliary()['users'];
        $arr['admin_id'] = '0';
        $arr['months'] = Appointment::all([DB::raw('distinct DATE_FORMAT(postdate,"%Y-%m") as postdate')]);
        $arr['current_month'] = '';
        if(strtotime($req->month)){
            $arr['current_month'] = $req->month;
            $monthStart = date('Y-m-01', strtotime($req->month));
            $monthEnd = date('Y-m-d', strtotime("last day of $monthStart"));
            $data = $data->whereBetween('postdate',[$monthStart, $monthEnd]);
        }


        if ($req->has('admin_id') && $req->admin_id != '0') {
            $arr['admin_id'] = $req->admin_id;
            $data = $data->where('admin_id', (int)$req->admin_id);
        }

        $data = $data->orderBy('postdate', 'desc')->get()->toArray();

        list($arr['total'], $arr['data_arr']) =  $this->reduceArr($data);

        if(isset($arr['current_month'])) return view('Book.sheetSearchByMonth', $arr);

        return view('Book.sheet', $arr);
    }
}
