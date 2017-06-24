<?php

namespace App\Http\Controllers\Dialog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DialogRequest;
use App\Models\Dialog;
use App\Models\Appointment;
use DB;

class DialogController extends Controller
{   

    /**
     * 思路： 根据对话数据取出预约数据，  然后把数据拼装成类似于 
     * @return [type] [description]
     */
    public function index()
    {
        //分两个数组存放， key为格式化后的日期
        $dialogs = Dialog::all()->toArray();

        $each_item_book = array();

        $total_data = array();

        //根据对话记录的admin_id取得预约数据， 避免多余的数据被取出;
        $admin_id_arr =  array_unique(array_column($dialogs, 'admin_id'));
        
        //预约数据
        $appoint_data = Appointment::whereIn('admin_id', $admin_id_arr)->get()->toArray();

        // 循环判断  根据 admin_id 和 预约时间
        foreach ($dialogs as &$diaItem) {
            foreach ($appoint_data as $appItem) {

                //初始化数组  避免 获取数组时报错
                if(!isset($diaItem['appoint'])) $diaItem['appoint'] = [];
                if(!isset($diaItem['patient'])) $diaItem['patient'] = [];

                if (($diaItem['admin_id'] == $appItem['admin_id']) && 
                     (formatDate($diaItem['date'], 'Y-m-d') == formatDate($appItem['add_time'], 'Y-m-d'))) { 
                    $diaItem['appoint'][$appItem['way']][] = $appItem['id'];
                    if($appItem['is_hospital'] == '1') $diaItem['patient'][$appItem['way']][] = $appItem['id'];
                } 
            }
        }   

        return view('Dialog.index', ['dialogs' => $dialogs]);

    }

    public function create()
    {
    	return view('dialog.create');
    }

    public function store(DialogRequest $req)
    {
    	$data = $req->all();
    	$data['admin_id'] = '1';
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
    	if(!$dialog = Dialog::find($id)) return;
    	return view('Dialog.edit', ['dialog'=>$dialog]);
    }

    public function update(DialogRequest $req, $id)
    {
    	if(!$dialog = Dialog::find($id)) return ['code'=>'1', 'msg'=>'更新失败，请刷新后重试', 'time'=>getNow()];
    	if(!$dialog->update($req->all())) return ['code'=>'1', 'msg'=>'更新失败，请刷新后重试', 'time'=>getNow()];
    	return ['code'=>'0', 'msg'=>route('dialog.index'), 'time'=>getNow()];
    }

    //对话报表
    public function sheet()
    {
        return view('Dialog.sheet');
    }

    //对话统计
    public function statistics()
    {

            
    }




}
