<?php

namespace App\Http\Controllers\Rank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RankRecord;
use App\Models\Way;
use App\Models\Rank;
use App\Models\Dialog;
use App\Models\Appointment;
use DB;

class ReportController extends Controller
{
    
    public function index()
    {
        $records = RankRecord::all()->toArray();
        $months = RankRecord::all([DB::raw('distinct DATE_FORMAT(rank_date, "%Y-%m") as rank_date')]);
        $rank_ways = Rank::all();

        list($records, $total) = $this->reduceArr($records);

        return view('Rank.Report.index', ['records'=>$records, 'total'=>$total, 'rank_ways'=>$rank_ways, 'months'=>$months]);
    }


    private function reduceArr($records)
    {
                //合计
        $total['cost'] = 0;
        $total['arrive'] = 0;
        $total['book_count'] = 0;
        $total['click'] = 0;
        $total['dialogs'] = 0;
        $total['show_times'] = 0;

        if(empty($records)) return [(array)$records, $total];

        list($diseases, $doctors, $users, $ways) = array_values(getAuxiliary());
        $data_arr = [];
        $date_arr = array_column($records, 'rank_date');
        $dateStart = min($date_arr);
        $dateStart = date('Y-m-d 00:00:00', strtotime($dateStart));
        $dateEnd = max($date_arr);
        $dateEnd = date('Y-m-d 23:59:59', strtotime($dateEnd));
        $apps = Appointment::whereBetween('add_time', [$dateStart, $dateEnd])->get(['id', 'is_hospital','add_time'])->toArray();      
        $dialogs = Dialog::whereBetween('date', [$dateStart, $dateEnd])->get()->toArray();
        foreach ($records as &$record) {
            $record['arrive'] = 0;
            $record['dialogs'] = 0;
            $record['book_count'] = 0;
            $record['admin_id'] = isset($users[$record['admin_id']]) ? $users[$record['admin_id']] : '未知';
            $record['rank_date'] = formatDate($record['rank_date'], 'Y-m-d');
        }


        foreach ($records as &$record) {
            foreach ($apps as $app) {
                if (formatDate($app['add_time'],'Y-m-d') == $record['rank_date']) {
                    $record['book_count'] += 1;
                    if($app['is_hospital'] == '1') $record['arrive'] += 1;
                }
            }

            foreach ($dialogs as $dialog) {
                $dialog['data'] = unserialize($dialog['data']);
                $sum = array_sum($dialog['data']);
                if (formatDate($dialog['date'],'Y-m-d') == $record['rank_date']) {
                    $record['dialogs'] += $sum;
                }
            }

        }

        foreach ($records as $recordItem) {
            $total['cost'] += $recordItem['cost'];
            $total['click'] += $recordItem['click'];
            $total['show_times'] += $recordItem['show_times'];
            $total['arrive'] += $recordItem['arrive'];
            $total['book_count'] += $recordItem['book_count'];
            $total['dialogs'] += $recordItem['dialogs'];
        }

        return [$records, $total];
    }



    public function searchByMonth(Request $req)
    {
        $records = new RankRecord();
        $current_month = '';
        $way = 0;
        if (strtotime($req->month)) {
            $current_month = $req->month;
            $dateStart = date('Y-m-01 00:00:00', strtotime($req->month));
            $dateEnd = date('Y-m-d 23:59:59', strtotime("last day of $dateStart"));
            $records = $records->whereBetween('rank_date', [$dateStart, $dateEnd]);
        }

        if ($req->has('way')) {
            $way = (int)$req->way;
            $records = $records->where('rank_way', (int)$req->way);
        } 

        $records = $records->get()->toArray();

        $months = RankRecord::all([DB::raw('distinct DATE_FORMAT(rank_date, "%Y-%m") as rank_date')]);
        $rank_ways = Rank::all();

        list($records, $total) = $this->reduceArr($records);

        return view('Rank.Report.search', ['records'=>$records, 'total'=>$total, 'rank_ways'=>$rank_ways, 
                                            'months'=>$months, 'current_month'=>$current_month,
                                            'way_id' => $way
                                            ]);

    }

}
