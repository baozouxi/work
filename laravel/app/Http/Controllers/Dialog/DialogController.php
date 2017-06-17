<?php

namespace App\Http\Controllers\Dialog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DialogRequest;
use App\Models\Dialog;

class DialogController extends Controller
{
    public function index()
    {
    	$dialogs = Dialog::all();

    	return view('Dialog.index', ['dialogs'=>$dialogs]);
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




}
