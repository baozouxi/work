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


    public function index()
    {
        //分两个数组存放， key为格式化后的日期
        $dialogs = Dialog::all()->toArray();

        $each_item_book = array();

        $total_data = array();

        foreach ($dialogs as $diaItem) {
            $data_after_format = formatDate($diaItem['date'], 'Y-m-d');
            $total_data[$data_after_format][$diaItem['admin_id']] = $diaItem;
        }   

        dd($total_data);
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
