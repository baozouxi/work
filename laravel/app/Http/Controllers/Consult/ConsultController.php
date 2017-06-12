<?php

namespace App\Http\Controllers\Consult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultRequest;
use App\Models\Consult;
use App\Models\Appointment;

class ConsultController extends Controller
{
    public function index()
    {
    	$consults = Consult::all()->toArray();
        $phone_num[] = array_column($consults, 'phone');
        
  		$appointments = Appointment::whereIn('phone',$phone_num)->get(['phone','is_hospital']);
        foreach ($appointments as $appItem) {
            foreach ($consults as &$conItem) {
                if($appItem->phone == $conItem['phone']){
                  $conItem['status'] =  $appItem['is_hospital'] == '1' ? '3' : '2';  
                } 

            }
        }
        return view('consult.index', ['consults'=>$consults]);

    }

    public function show($id)
    {
    	if(!$consult = Consult::find($id)) return['code'=>'1', 'msg'=>'该次咨询不存在，请刷新后重试', 'time'=>getNow()];
    	return $consult->content;
    }

    public function create()
    {
    	return view('Consult.create');
    }

    public function store(ConsultRequest $req)
    {
    	$data = $req->all();
    	unset($req);
    	$data['admin_id'] = '1';
    	if(!Consult::create($data)) return ['code'=>'1', 'msg'=>'咨询创建失败，请联系管理员', 'time'=>getNow()];
    	return ['code'=>'0', 'msg'=>route('consult.index'), 'time'=>getNow()];
    }

    public function edit(Request $req, $id)
    {
    	if(!$consult = Consult::find($id)) return['code'=>'1', 'msg'=>'该次咨询不存在，请刷新后重试', 'time'=>getNow()];
    	return view('consult.edit', ['consult'=>$consult]);
    }

    public function update(ConsultRequest $req, $id)
    {
    	if(!$consult = Consult::find($id)) return['code'=>'1', 'msg'=>'该次咨询不存在，请刷新后重试', 'time'=>getNow()];
    	if(!$consult->update($req->all())) return ['code'=>'1', 'msg'=>'修改失败，请重试', 'time'=>getNow()];
    	return ['code'=>'0', 'msg'=>route('consult.index'), 'time'=>getNow()];
    }

    public function updateStatus($id)
    {
        if(!$consult = Consult::find((int)$id)) return;
        $code = '1';
        $msg = '已更新';
        if ($appointment = Appointment::where('phone', $consult->phone)->first()) {
            $code = '2';
            $msg = '已预约';
            if ($appointment->is_hospital !== '0') {
                $code = '3';
                $msg = '已到诊';
            } 
        } 
        $consult->status = $code;
        if(!$consult->save()) return;
        return ['code'=>$code, 'msg'=>$msg, 'time'=>getNow()];


    }
}
