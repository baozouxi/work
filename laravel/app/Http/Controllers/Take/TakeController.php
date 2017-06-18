<?php

namespace App\Http\Controllers\Take;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CallbackController;
use App\Http\Requests\TakeRequest;
use App\Models\Patient;
use App\Models\Take;
use DB;

class TakeController extends Controller
{
    
    public function index()
	{
        $takes = Take::leftJoin('patients', 'takes.patient_id', '=', 'patients.id')->orderBy('add_time','desc')->get(['patients.name','takes.*', 'patients.id as patientId']);
        return view('take.index', ['takes' => $takes]);
    }

    public function infoWithPatient(Patient $patientId)
    {
    	$takes = Take::where('patient_id', $patientId->id)->get();
    	$area = CallbackController::area($patientId->province-1, $patientId->city-1, $patientId->town-1);
    	foreach ($area as $field => $item) {
    		$patientId->$field = $item;
    	}
		return view('take.infoWithPatient',['patient'=>$patientId, 'takes'=>$takes]);
    }

    public function create(Request $req)
    {
       	if((!isset($req->patientId)) || (!$patient = Patient::find((int)$req->patientId))) return ['code'=>'1', 'msg'=>'该患者不存在，请刷新后重试', 'time'=>getNow()];
        $area = CallbackController::area($patient->province-1, $patient->city-1, $patient->town-1);
        foreach ($area as $field => $val) {
            $patient->$field = $val;
        }
        $req->session()->put('patientId',(int)$req->patientId);
        return view('take.create', ['data'=>$patient]);

    }

    public function store(TakeRequest $req)
    {
        if(!$patient_id =  $req->session()->pull('patientId')) return;
        $data = $req->all();
        $data['patient_id'] = $patient_id;
        $data['admin_id'] = '1';
        if(!$res = Take::create($data) ) return ['code'=>'1', 'msg'=>'消费创建失败，请刷新后重试', 'time'=>getNow()];

        return ['code'=>'0', 'msg'=>route('takeWithInfo', ['patientId'=>$patient_id]), 'time'=>getNow()];    

    }
 	

    public function show($patientId)
    {
        if(!$patient = Patient::find((int)$patientId));
        $takes = Take::where('patient_id',$patientId)->orderBy('add_time', 'desc')->get();
        return view('take.show', ['data'=>$patient, 'takes'=>$takes]);
    }

    public function edit($takeId)
    {
        if(!$take = Take::find($takeId)) return ['code'=>'1', 'msg'=>'该消费不存在，请刷新后重试', 'time'=>getNow()];
        if(!$patient = Patient::find($take->patient_id)) return ['code'=>'1', 'msg'=>'病人不存在，请刷新后重试', 'time'=>getNow()];
        return view('take.edit', ['data'=>$patient, 'take'=>$take]);
    }

    public function update(TakeRequest $req, $id)
    {
        if(!$take = Take::find((int)$id)) return ['code'=>'1','msg'=>'该消费不存在，请刷新后重试', 'time'=>getNow()];
        $data = $req->all();
        if(!$take->update($data)) return ['code'=>'1', 'msg'=>'消费修改失败，请重试', 'time'=>$getNow()];
        return ['code'=>'0', 'msg'=>route('takeWithInfo',['patientId'=>$take->patient_id]), 'time'=>getNow()];
        
    }

    public function delete()
    {
        
    }
}
