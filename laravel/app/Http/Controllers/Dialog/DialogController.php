<?php

namespace App\Http\Controllers\Dialog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dialog\DialogController;
use App\Http\Requests\DialogRequest;
use App\Models\Dialog;
use App\Models\Way;
use App\Models\Appointment;
use DB;

class DialogController extends Controller
{   

    public function index()
    {
        $dialogs = Dialog::all()->toArray();

        list($dialogs, $ways) = $this->reduceArr($dialogs);

        return view('Dialog.index', ['dialogs' => $dialogs, 'ways'=>$ways]);
    }


    public function reduceArr($dialogs)
    {
        $ways = Way::where('is_use', '1')->get(['id', 'name'])->toArray();
        if(empty($dialogs)) return[[],$ways];

        $date_arr = array_column($dialogs, 'date');
        $dateStart = min(array_values($date_arr));
        $dateEnd = max(array_values($date_arr));
        $dateEnd = formatDate($dateEnd, 'Y-m-d 23:59:59');
        $apps = Appointment::whereBetween('add_time', [$dateStart, $dateEnd])
                            ->get([DB::raw('DATE_FORMAT(add_time, "%Y-%m-%d") as add_time'), 'is_hospital'])
                            ->toArray();
        $temp_arr = []; //临时存放数据数组

        foreach ($apps as $app) {
            $temp_arr[$app['add_time']][] = $app;
        }

        unset($apps);

        $app_arr = [];
        foreach ($temp_arr as  $date => $item) {
            $app_arr[$date]['book_count'] = count($item);
            if(!isset($app_arr[$date]['arrive'])) $app_arr[$date]['arrive'] = 0;
            foreach ($item as $v) {
                if($v['is_hospital'] == '1') $app_arr[$date]['arrive'] += 1;
            }       
        }

        $users = getAuxiliary()['users'];
        foreach ($dialogs as &$dialog) {
            $dialog['admin_id'] = isset($users[$dialog['admin_id']]) ? $users[$dialog['admin_id']] : '未知';
            $dialog['data'] = unserialize($dialog['data']);
            $dialog['date'] = formatDate($dialog['date'], 'Y-m-d');
            $dialog['all_count'] = array_sum($dialog['data']);
            $date = formatDate($dialog['date'], 'Y-m-d');
            $dialog['book_count'] = isset($app_arr[$date]['book_count']) ? $app_arr[$date]['book_count'] : 0 ;
            $dialog['arrive'] = isset($app_arr[$date]['arrive']) ? $app_arr[$date]['arrive'] : 0 ;
        }

        return [$dialogs, $ways];
    }

    public function create()
    {
        $ways = Way::where('is_use','1')->get();

        if($ways->isEmpty()) return '错误：缺少途径分类，请至少保留一条记录并启用它！';

    	return view('dialog.create', ['ways'=>$ways]);
    }

    public function store(DialogRequest $req)
    {
        $all = $req->all();
    	$data['date'] = $all['date'];
        $diaExist = Dialog::where('date', formatDate($data['date'], 'Y-m-d'))->get([DB::raw("DATE_FORMAT(date, '%Y-%m-%d') as date")]);
        if(!$diaExist->isEmpty()) return code('该日期已存在记录','1');     
        $data['content'] = $all['content'];
        $data['admin_id'] = '1';
        unset($all['date']); 
        unset($all['content']);
        unset($all['_token']);
        $all = array_map('intval', $all);
        $data['data'] = serialize($all);
    	if(!Dialog::create($data)) return ['code'=>'1', 'msg'=> '添加失败，请重试', 'time'=>getNow()];
    	return ['code'=>'0', 'msg'=>route('dialog.index'), 'time'=>getNow()];
    }

    public function show($id)
    {
    	if(!$dialog = Dialog::find($id)) return;

    	return $dialog->content;

    }

    public function edit($id)
    {
    	$dialog = Dialog::findOrFail($id);

        $dialog->data = unserialize($dialog->data);

        $ways = Way::where('is_use', '1')->get();

    	return view('Dialog.edit', ['dialog'=>$dialog, 'ways'=>$ways]);

    }

    public function update(DialogRequest $req, $id)
    {
        $dialog = Dialog::findOrFail($id);
        $all = $req->all();
        $data['date'] = $all['date'];
        $date = formatDate($data['date'], 'Y-m-d');
        $diaExist = Dialog::where('date', $date)->get([DB::raw("DATE_FORMAT(date, '%Y-%m-%d') as date")]);
        if($date != formatDate($dialog->date, 'Y-m-d')){
            if(!$diaExist->isEmpty()) return code('该日期已存在记录','1');     
        }
        $data['content'] = $all['content'];
        $data['admin_id'] = '1';
        unset($all['date']); 
        unset($all['content']);
        unset($all['_token']);
        $all = array_map('intval', $all);
        $data['data'] = serialize($all);
    	if(!$dialog = Dialog::find($id)) return ['code'=>'1', 'msg'=>'更新失败，请刷新后重试', 'time'=>getNow()];
    	if(!$dialog->update($data)) return ['code'=>'1', 'msg'=>'更新失败，请刷新后重试', 'time'=>getNow()];
    	return ['code'=>'0', 'msg'=>route('dialog.index'), 'time'=>getNow()];
    }

    //对话报表
    public function sheet()
    {
        $dialogs = Dialog::all()->toArray();
        $months =  Dialog::all(DB::raw('distinct DATE_FORMAT(date, "%Y-%m") as date'))->toArray();
        list($dialogs, $total, $users, $ways) = $this->sheetRecudeArr($dialogs);
        return view('Dialog.sheet', ['dialogs'=>$dialogs,'ways'=>$ways, 'total'=>$total, 'months'=>$months, 'users'=>$users]);
    }

    public function sheetRecudeArr($dialogs)
    {  
        $users = [];
        $ways = [];
        list($dialogs, $ways) = $this->reduceArr($dialogs);
        //合计
        $total['all_count'] = 0;
        $total['book_count'] = 0;
        $total['arrive'] = 0;
        $total['data'] = [];

        foreach ($dialogs as $dialog) {
            $users[] = $dialog['admin_id'];
            $total['all_count'] += $dialog['all_count'];
            $total['arrive'] += $dialog['arrive'];
            $total['book_count'] += $dialog['book_count'];

            foreach ($ways as $way) {
                if(!isset($total['data'][$way['id']])) $total['data'][$way['id']] = 0;
                if(isset($dialog['data'][$way['id']])) {
                     $total['data'][$way['id']] += $dialog['data'][$way['id']];
                }
            }
        }

        return [$dialogs, $total, $users,$ways];

    }


    public function sheetSearchByMonth(Request $req)
    {
        $dialogs = new Dialog();
        $months =  Dialog::all(DB::raw('distinct DATE_FORMAT(date, "%Y-%m") as date'))->toArray();
        $admin_id = 0;
        $current_month = '';
    
        if (strtotime($req->month)) {
            $current_month = $req->month;
            $dateStart = date('Y-m-01 00:00:00', strtotime($req->month));
            $dateEnd = date('Y-m-d 23:59:59', strtotime("last day of $dateStart"));
            $dialogs = $dialogs->whereBetween('date', [$dateStart, $dateEnd]);
        }

        if ($req->has('admin_id')) {
            $admin_id = (int)$req->admin_id;
            $dialogs = $dialogs->where('admin_id', $admin_id);
        }
        $dialogs = $dialogs->get()->toArray();
        list($dialogs, $total, $users, $ways) = $this->sheetRecudeArr($dialogs);
        return view('Dialog.sheetSearch', ['dialogs'=>$dialogs,'ways'=>$ways, 'total'=>$total, 
                                            'current_month'=>$current_month, 'months'=>$months, 
                                            'users'=>$users, 'admin_id'=>$admin_id]);
    }


}
