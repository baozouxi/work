<?php

namespace App\Http\Controllers\TelConsult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CallBackController;
use App\Http\Requests\TelConsultRequest;
use App\Models\TelConsult;
use App\Models\Appointment;

class TelConsultController extends Controller
{
    //
    //
    public function index()
    {
        $telConsults = TelConsult::all()->toArray();
        // 获取电话数组 作为条件查询预约表
        $phone_nums = array_column($telConsults, 'phone');
        $appointments = Appointment::where('phone', $phone_nums)->get(['phone','is_hospital']);

        
        foreach ($telConsults as &$telItem) {
            $area = CallBackController::area($telItem['province']-1, $telItem['town']-1, $telItem['city']-1);
            $telItem['province'] = $area['province'];
            $telItem['city'] = $area['city'];
            $telItem['town'] = $area['town'];
            foreach ($appointments as $appItem) {
                if ($appItem->phone == $telItem['phone']) {
                    $telItem['status'] = ($appItem->is_hospital == '1') ? '3' : '2';
                }
                
            } 
        }

    	return view('TelConsult.index', ['telConsults'=>$telConsults]);	
    }

    public function show($id)
    {
     
        if(!$telConsult = TelConsult::find((int)$id)) return;
        return $telConsult->content;
    }

    public function create()
    {
    	return view('TelConsult.create');
    }

    public function store(TelConsultRequest $req)
    {
        $data = $req->all();
        $data['admin_id'] = '1';
        if(!TelConsult::create($data)) return ['code'=>'1', 'msg'=>'电话咨询添加失败，请重试', 'time'=>getNow()];
        return ['code'=>'0', 'msg'=>route('tel-consult.index'), 'time'=>getNow()];
    }

    public function edit($id)
    {   
        if(!$telConsult = TelConsult::find($id)) return;

        return view('TelConsult.edit', ['telConsult'=>$telConsult]);
    }

    public function update(TelConsultRequest $req, $id)
    {   
        if(!$telConsult = TelConsult::find($id)) return;
        $data = $req->all();
        if(!isset($data['availability'])) $data['availability'] = '1';
        if($telConsult->update($data)) return ['code'=>'0', 'msg'=>route('tel-consult.index'), 'time'=>getNow()];
        return ['code'=>'1', 'msg'=>'修改失败，请重试', 'time'=>getNow()];
    }

    public function updateStatus(TelConsult $id)
    { 
        $id->status = '1';
        $msg = '已更新';
        if($appointment = Appointment::where('phone', $id->phone)->first()) {
            $id->status = '2';
            $msg = '已预约';
            if ($appointment->is_hospital == '1') {
                $id->status = '3';
                $msg = '已到院';
            } 
        }
        if($id->save())  return ['code'=>$id->status, 'msg'=>$msg, 'time'=>getNow()];
        return;
    }

    

}
