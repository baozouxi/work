<?php

namespace App\Http\Controllers\Rank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RankRecord;
use App\Models\Rank;
use DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $records = RankRecord::all()->toArray();
        $key = 'admin_id';
        $months = RankRecord::all([DB::raw('distinct DATE_FORMAT(rank_date, "%Y-%m") as rank_date')]);
        list($data_arr, $total) = $this->reduceArr($records, $key);
        return view('Rank.Statis.index', ['data_arr'=>$data_arr, 'total'=>$total, 'months'=>$months]);
    }


    private function reduceArr($records, $key)
    {

        $data_arr = [];    
        $rank_arr = Rank::all()->toArray();
        $rank_arr = array_column($rank_arr, 'name', 'id');
        $week = ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
        $total['cost'] = 0;
        $total['click'] = 0;
        $total['show_times'] = 0;
        $users = getAuxiliary()['users'];
        foreach ($records as &$record) {
            $total['cost'] += $record['cost'];
            $total['click'] += $record['click'];
            $total['show_times'] += $record['show_times'];
            $record['rank_way'] = isset($rank_arr[$record['rank_way']])?  $rank_arr[$record['rank_way']] : '未知';
            $record['admin_id'] = isset($users[$record['admin_id']])?  $users[$record['admin_id']] : '未知';
        }   

        foreach ($records as $item) {
            switch ($key) {
                case 'month':
                    $date_field = formatDate($item['rank_date'], 'm');
                    $field = $date_field.'月';
                    break;
                case 'day':
                    $date_field = formatDate($item['rank_date'], 'j');
                    $field = $date_field.'号';
                    break;
                case 'week':
                    $date_field = formatDate($item['rank_date'], 'w');
                    $field = $week[$date_field];
                    break;
                default:
                    $field = $item[$key];
                    break;
            }
            if(!isset($data_arr[$field]['cost']))  $data_arr[$field]['cost'] = 0;
            if(!isset($data_arr[$field]['click']))  $data_arr[$field]['click'] = 0;
            if(!isset($data_arr[$field]['show_times']))  $data_arr[$field]['show_times'] = 0;
            $data_arr[$field]['cost'] += $item['cost'];
            $data_arr[$field]['click'] += $item['click'];
            $data_arr[$field]['show_times'] += $item['show_times'];
        }
        return [$data_arr, $total];
    }

    public function searchByMonth(Request $req)
    {
        $records = new RankRecord();
        $months = RankRecord::all([DB::raw('distinct DATE_FORMAT(rank_date, "%Y-%m") as rank_date')]);
        $current_month = '';
        if (strtotime($req->month)) {
            $current_month = $req->month;
            $dateStart = date('Y-m-01 00:00:00', strtotime($req->month));
            $dateEnd = date('Y-m-d 23:59:59', strtotime("last day of $dateStart"));
            $records = $records->whereBetween('rank_date', [$dateStart, $dateEnd]);
        }
        $records = $records->get()->toArray();
        $key = 'admin_id';
        if($req->has('key')) $key = $req->key;

        list($data_arr, $total) = $this->reduceArr($records, $key);

        if($req->has('key')) return view('Rank.Statis.listWithoutNav', ['data_arr'=>$data_arr, 'total'=>$total]);

        return view('Rank.Statis.search', ['data_arr'=>$data_arr, 'total'=>$total, 'months'=>$months, 'current_month'=>$current_month]);
    }
}
