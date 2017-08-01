<?php

namespace App\Http\Controllers\Consult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CallBackController;
use App\Http\Requests\ConsultRequest;
use App\Models\Consult;
use App\Models\Appointment;
use App\Models\Way;
use App\Models\Disease;

class ConsultController extends Controller
{
    public function index()
    {
    	$consults = Consult::all()->toArray();
        $consults = $this->reduceArr($consults);
        return view('consult.index', ['consults'=>$consults]);

    }


    public function timeToTrack()
    {
        $dateStart = date('Y-m-d 00:00:00', time());
        $dateEnd = date('Y-m-d 23:59:59', time());
        $consults = Consult::whereBetween('track_time', [$dateStart, $dateEnd])->get()->toArray();
        $consults = $this->reduceArr($consults);

        return view('consult.indexWithoutNav', ['consults'=>$consults]);
    }


    public function reduceArr($consults)
    {
        if(empty($consults)) return [];
        $phone_num[] = array_column($consults, 'phone');
        
        $appointments = Appointment::whereIn('phone',$phone_num)->get(['phone','is_hospital']);
        list($diseases, $doctors, $users, $ways) = array_values(getAuxiliary());

        foreach ($consults as &$consult) {
            $consult['dis'] = isset($diseases[$consult['dis']]) ? $diseases[$consult['dis']]  : '未知' ;
            $consult['way'] = isset($ways[$consult['way']]) ? $ways[$consult['way']]  : '未知' ;
            $consult['admin_id'] = isset($users[$consult['admin_id']]) ? $users[$consult['admin_id']]  : '未知' ;
            list($consult['province'],$consult['city'],$consult['town']) = 
                array_values(CallBackController::area($consult['province']-1,$consult['city']-1,$consult['town']-1));
        }

        foreach ($appointments as $appItem) {
            foreach ($consults as &$conItem) {
                if($appItem->phone == $conItem['phone']){
                  $conItem['status'] =  $appItem['is_hospital'] == '1' ? '3' : '2';  
                } 

            }
        }

        return $consults;

    }

    public function show($id)
    {
    	if(!$consult = Consult::find($id)) return['code'=>'1', 'msg'=>'该次咨询不存在，请刷新后重试', 'time'=>getNow()];
    	return $consult->content;
    }

    public function create()
    {
        $ways = Way::where('is_use', '1')->get();
        $diseases = Disease::where('is_use', '1')->get();
        if($ways->isEmpty() || $diseases->isEmpty()) return  '错误：请至少添加一项途径，病种并且启用它';
    	return view('Consult.create', ['ways'=>$ways, 'diseases'=>$diseases]);
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
        $ways = Way::where('is_use', '1')->get();
        $diseases = Disease::where('is_use', '1')->get();
        if($ways->isEmpty() || $diseases->isEmpty()) return  '错误：请至少添加一项途径，病种并且启用它';
    	if(!$consult = Consult::find($id)) return['code'=>'1', 'msg'=>'该次咨询不存在，请刷新后重试', 'time'=>getNow()];
    	return view('consult.edit', ['consult'=>$consult, 'diseases'=>$diseases, 'ways'=>$ways]);
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
