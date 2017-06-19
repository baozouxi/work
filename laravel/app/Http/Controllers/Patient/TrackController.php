<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Requests\PatientTrackRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CallBackController;
use App\Models\Patient;
use App\Models\PatientTrack;
use App\Models\Take;
use App\Models\Appointment;

/**
 * 病人回访控制器
 */
class TrackController extends Controller
{
    public function index()
    {
        $tracks = PatientTrack::orderBy('add_time','desc')->get();
        $ids = array();

        foreach ($tracks as $item) {
            $ids[] = $item->patient_id;
        }

        $patients = Patient::whereIn('id',$ids)->get(['id','name']);

        foreach ($patients as $patientItem) {
            foreach ($tracks as &$item) {
                if($item->patient_id == $patientItem->id) $item->name = $patientItem->name;
            }
        }
        // 销毁变量
        unset($patients);
        return view('patient.track.index',['tracks' => $tracks]);
    }

    public function show($patientId)
    {
        $id = (int)$patientId;
        $patientInfo = Patient::find($id);
        $area = CallBackController::area($patientInfo->province-1, $patientInfo->city-1, $patientInfo->town-1);

        foreach ($area as $field => $val) {
            $patientInfo->$field = $val;
        }

        $track = PatientTrack::where('id',$id)->get();


    	return view('patient.track.show',['data'=>$patientInfo,'TrackData'=>$track]);
    }

    public function edit(Request $req, $id)
    {
        $trackid = (int)$id;
        if(!$patientId = $req->pId) return ['code'=>'1','msg'=>'参数错误', 'time'=>getNow()];
        if(!$data = Patient::find($patientId)) return ['code'=>'1', 'msg'=>'该患者不存在，请刷新后重试', 'time'=>getNow()];
        if(!$trackData = PatientTrack::find($trackid)) return ['code'=>'1', 'msg'=>'该回访不存在，请刷新后重试', 'time'=>getNow()];
        return view('patient.track.edit', ['data'=>$data, 'trackData'=>$trackData]);
    }


    public function create(Request $req)
    {

        $id = (int)$req->id;
        if(!$data = Patient::find($id)) return ['code'=>'1', 'msg'=>'该患者不存在，请刷新后重试', 'time'=>getNow()];
        $area = CallBackController::area($data->province-1, $data->city-1, $data->town-1);
        $data = replaceArea($area, $data);
        return view('patient.track.create', ['data'=>$data]);
    }

    public function store(PatientTrackRequest $req)
    {   
        $data = $req->all();
        $id = $data['patient_id'] = $data['aid'];
        $data['next_time'] = $data['postdate'];
        $data['admin_id'] = '1';
        if(!PatientTrack::create($data)) return ['code'=>'1', 'msg'=>'添加回访失败，请稍后重试', 'time'=>getNow()];
        if (isset($data['state']) && $data['state'] == '1') {
            $patient = Patient::find($id);
            $patient->undate = '1';
            if(!$patient->save()) return ['code'=>'1', 'msg'=>'患者状态修改失败', 'time'=>getNow()];
        }
        return ['code'=>'0', 'msg'=>route('trackWithInfo',['id'=>$id]), 'time'=>getNow()];
    }

    public function update(PatientTrackRequest $req, $id)
    {
        $id = (int)$id;
        if(!$trackdata = PatientTrack::find($id)) return ['code'=>'1', 'msg'=>'该回访不存在，请刷新后重试', 'time'=>getNow()];
        $data = $req->all();
        $data['next_time'] = $data['postdate'];

    }

    public function indexWithInfo($patientId)
    {
    	$id = (int)$patientId;
        if (!$data = Patient::find($id)) return ['code'=>'1', 'msg'=>'该病人不存在，请刷新后重试', 'time'=>getNow()];
        $area = CallBackController::area($data->province-1, $data->city-1, $data->town-1);
        $data = replaceArea($area, $data);
        $tracks = PatientTrack::where(['patient_id'=>$id])->get();
    	return view('patient.track.indexWithInfo', ['data'=>$data, 'tracks' => $tracks]);
    }


    //消费统计
    public function statistics(Request $req)
    {
        

        $date = time();
        $way = 'admin_id';
        $week = ['0'=>'星期天', '1'=>'星期一','2'=>'星期二','3'=>'星期三','4'=>'星期四','5'=>'星期五','6'=>'星期六'];
        $gender = ['1'=>'男', '2'=>'女'];
        if (isset($req->date) && formatDate($req->date)) $date = strtotime($req->date);

        $monthStart = date('Y-m-01', $date);
        $monthEnd = date('Y-m-d', strtotime("last day of $monthStart"));    
        $patients = Patient::whereBetween('add_time', [$monthStart, $monthEnd])->get()->toArray();
        $ids = array_unique(array_column($patients, 'id'));
        // 消费
        $takes = Take::whereIn('patient_id',$ids)->orderBy('add_time','ASC')->get()->toArray();
        $total['take_sum'] = 0;
        $total['patient_sum'] = count($patients);
        // 复诊总人数
        $total['re_treatment_sum'] = 0;
        $total['re_treatment_takes_sum'] = 0;
        //就诊总人数
        $total['treatment_sum'] = count(array_column($takes, 'id', 'patient_id'));


        // 组合数据
        foreach ($takes as $take) {
            $sum = $take['check_cost']+$take['treatment_cost']+$take['drug_cost']+ $take['hospitalization_cost'];
            // 总消费
            $total['take_sum'] += $sum;
            foreach ($patients as $key => $patient) {
                if($take['patient_id'] == $patient['id']) {
                    $patients[$key]['takes'][] = $sum;
                }
    
            }
        }      
        //临时数组
        $data_temp = array();
        foreach ($patients as $patient) {
            if(isset($patient['takes']) && (count($patient['takes']) > 1) ){
                $total['re_treatment_sum'] += 1;
                // 复诊总消费
                $total['re_treatment_takes_sum'] += (array_sum($patient['takes']) - $patient['takes']['0']);
              
            }
            switch ($req->way) {
                case 'save':
                    $data_temp[$patient['admin_id']][] = $patient;  
                    break;
                case 'time':
                    $data_temp[formatDate($patient['add_time'],'H').'点'][] = $patient;  
                    break;
                case 'week':
                    $data_temp[$week[formatDate($patient['add_time'],'w')]][] = $patient;  
                    break;
                case 'day':
                    $data_temp[formatDate($patient['add_time'],'j').'号'][] = $patient;
                    break;
                case 'month':
                    $data_temp[formatDate($patient['add_time'],'n').'月'][] = $patient;
                    break;
                case 'dis':
                    $data_temp[$patient['dis']][] = $patient;  
                    break;
                case 'gender':
                    $data_temp[$gender[$patient['gender']]][] = $patient;  
                    break;
                case 'age':
                    $data_temp[$patient['age'].'岁'][] = $patient;  
                    break;
                case 'doc':
                    $data_temp[$patient['dep']][] = $patient;  
                    break;           
                default:
                    $data_temp[$patient['admin_id']][] = $patient;  
                    break;
            }
            
        }

        // 数据统计
        $data = array();
        foreach ($data_temp as $field => $item) {
            //到诊
            $data[$field]['patient_sum'] = count($item);
            // 就诊
            $data[$field]['treatment_sum'] = 0;
            //总消费
            $data[$field]['treatment_takes_sum'] = 0;
            // 复诊总人数
            $data[$field]['re_treatment_sum'] = 0;
            // 复诊总消费
            $data[$field]['re_treatment_takes_sum'] = 0;
            foreach ($item as $value) {
                if(isset($value['takes'])){
                    $data[$field]['treatment_sum'] +=1;  
                    $data[$field]['treatment_takes_sum'] += array_sum($value['takes']);
                    if(count($value['takes']) > 1){
                        $data[$field]['re_treatment_sum'] += 1;
                        $data[$field]['re_treatment_takes_sum'] += (array_sum($value['takes']) - $value['takes']['0']);
                    }
                } 
            }
        }
    
        // 就诊消费
        $total['treatment_cost_sum'] = $total['take_sum'] - $total['re_treatment_takes_sum'];

        //销毁变量
        unset($takes);
        unset($patients);          
        unset($data_temp);
        if($req->way) return view('Patient.track.statistics.list', ['total'=>$total, 'data'=>$data]);
        return view('Patient.track.statistics.index', ['total'=>$total, 'data'=>$data]);

    }


}

