<?php

namespace App\Http\Controllers\Dialog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dialog;
use DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $dialogs = Dialog::all()->toArray();
        $key = 'admin_id';

        $months = Dialog::all(DB::raw('distinct DATE_FORMAT(date, "%Y-%m") as date'));

        list($data_arr, $total) = $this->reduceArr($dialogs, $key);


        return view('Dialog.Statis.index', ['total'=>$total, 'dialogs'=>$data_arr, 'months'=>$months]);
    }


    public function reduceArr($dialogs, $key)
    {
        $data_arr = [];
        $total['all_count'] = 0;
        $total['arrive'] = 0;
        $total['book_count'] = 0;
        $dialogController = new DialogController();
        $dialogs = $dialogController->reduceArr($dialogs)['0'];
        $week = ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
        foreach ($dialogs as $dialog) {

            switch ($key) {
                case 'day':
                    $time_format = formatDate($dialog['date'], 'j');
                    $field = $time_format.'号';
                break;
                case 'week':
                    $time_format = formatDate($dialog['date'], 'w');
                    $field = $week[$time_format];
                break;
                case 'month':
                    $time_format = formatDate($dialog['date'], 'n');
                    $field =  $time_format.'月';
                break;

                default:
                    $field = $dialog[$key];
                
            }


            if(!isset($data_arr[$field]['all_count'])) $data_arr[$field]['all_count'] = 0;
            if(!isset($data_arr[$field]['arrive'])) $data_arr[$field]['arrive'] = 0;
            if(!isset($data_arr[$field]['book_count'])) $data_arr[$field]['book_count'] = 0;

            $data_arr[$field]['all_count'] += $dialog['all_count'];
            $data_arr[$field]['arrive'] += $dialog['arrive'];
            $data_arr[$field]['book_count'] += $dialog['book_count'];
            $total['all_count'] += $dialog['all_count']; 
            $total['arrive'] += $dialog['arrive']; 
            $total['book_count'] += $dialog['book_count']; 
        }

        return [$data_arr, $total];

    }


    public function searchByMonth(Request $req)
    {
        $dialogs = new Dialog();
        $current_month = '';
        $months = Dialog::all(DB::raw('distinct DATE_FORMAT(date, "%Y-%m") as date'));
        $key = 'admin_id';
        if (strtotime($req->month)) {
            $current_month = $req->month;
            $dateStart = date('Y-m-01 00:00:00', strtotime($req->month));
            $dateEnd = date('Y-m-d 23:59:59', strtotime("last day of $dateStart"));
            $dialogs = $dialogs->whereBetween('date', [$dateStart, $dateEnd]);
        }
        if($req->has('key')) $key = $req->key;


        $dialogs = $dialogs->get()->toArray();

        list($data_arr, $total) = $this->reduceArr($dialogs, $key);

        if($req->has('key')) return view('Dialog.Statis.listWithoutNav', ['total'=>$total, 'dialogs'=>$data_arr]);

        return view('Dialog.Statis.search', ['total'=>$total, 'dialogs'=>$data_arr, 'months'=>$months,'current_month'=>$current_month]);
    }
}
