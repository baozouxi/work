<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CallBackController;
use App\Models\Patient;
use App\Models\PatientTrack;
use App\Models\Appointment;
use App\Models\Take;
use DB;

class PatientController extends Controller
{
    
	// 列表显示
    public function index()
    {
        $data = Patient::orderBy('add_time','desc')->paginate('20');
        $count = Patient::count();
        $takes = Take::groupBy('patient_id')->select(DB::raw('sum(check_cost+treatment_cost+drug_cost+hospitalization_cost) as sum'), 'patient_id')->get();
        $ids = array();
        foreach ($data as &$item) {
            foreach($takes as $take_item){
                if($take_item->patient_id == $item->id) $item->sum = $take_item->sum;
            }
            $ids[] = $item->id;
            $area = CallBackController::area($item->province-1, $item->city-1, $item->town-1);
            $item->province = $area['province'];
            $item->city = $area['city'];
            $item->town = $area['town'];
        }

        
        $tracks = PatientTrack::whereIn('patient_id',$ids)->orderBy('next_time','desc')->get(['patient_id','next_time'])->toArray();
        
        foreach ($data as &$patientItem) {
            $tmp = array();
            foreach ($tracks as $trackItem) {
                if ($patientItem->id == $trackItem['patient_id']) {
                    $tmp[] = $trackItem;
                }   

            }
            $patientItem->tracks = $tmp;
        }
        

    	return view('Patient.index', ['data'=>$data, 'count'=>$count]);
    }

    public function create(Request $req)
    {
        if(isset($req->bookId)) $book = Appointment::find((int)$req->bookId) ?: '';
        //病历号 并存入session用以防止重复提交
        $medical_num = mt_rand(100,999).time();
        $req->session()->put('medical_num', $medical_num);
        if(isset($book) && $book !== '' ) return view('patient.createWithBook', ['medical_num'=>$medical_num,'book'=>$book]);
    	return view('Patient.create', ['medical_num'=>$medical_num]);
    }

    public function store(PatientStoreRequest $req)
    {

        if(!$req->session()->has('medical_num')) return ['code'=>'1','msg'=>'请勿重复提交','time'=>date('Y-m-d H:i:s')];
        $data = $req->all();
        $data['medical_num'] = $data['bid'];
        $data['admin_id'] = '1';
    
        try{
            DB::beginTransaction();
            if (isset($data['book_id']) && $data['book_id'] !== '0') {
                $book = Appointment::find((int)$data['book_id']);
                $book->is_hospital = '1';
                if(!$book->save())  throw new \Exception("预约修改失败");
            }

            if(!$data = Patient::create($data)) throw new \Exception('病人添加失败');
            $req->session()->forget('medical_num');
            DB::commit();
            return ['code'=>'0', 'msg'=>route('patient.index'), 'time'=>date('Y-m-d H:i:s')];
         }catch(\Exception $e){
            DB::rollback();
            return ['code'=>'1', 'msg'=>$e->getMessage(), 'time'=>getNow()];
         }
       
        
    }

    public function edit(Request $req, $id)
    {
        $id = (int)$id;
        $medical_num = mt_rand(100,999).time();
        $req->session()->put('medical_num', $medical_num);
        if(!$data = Patient::find($id)) return ['code'=>'1','msg'=>'该患者不存在','time'=>date('Y-m-d H:i:s')];

        return view('Patient.edit',['data'=>$data, 'medical_num'=>$medical_num]);
    }   

    public function update(PatientStoreRequest $req,$id)
    {
        $id = (int)$id;
        $infoData = $req->all();
        DB::beginTransaction();
        try{

            if(!$data = Patient::find($id)) throw new \Exception('患者不存在');
            $infoData['medical_num'] = $infoData['bid'];

            if(!$data->update($infoData)) throw new \Exception('更新失败，请稍后重试');

            if ($data->book_id !== 0) {
                if (!$book = Appointment::find($data->book_id)) throw new \Exception("预约修改失败，请稍后重试");
                if (!$book->update($infoData)) throw new \Exception('预约信息修改失败，请联系管理员');
            } 

            DB::commit();
            return ['code'=>'0', 'msg'=>route('patient.index'), 'time'=>getNow()];

        } catch(\Exception $e){
            DB::rollback();
            return ['code'=>'1', 'msg'=>$e->getMessage(), 'time'=>getNow()];
        }   
       
    }

    public function show($id)
    {
        $id = (int)$id;
        if(!$data = Patient::find($id)) return ['code'=>'1','msg'=>'该患者不存在，请刷新后重试', 'time'=>getNow()];
        $area = CallBackController::area($data->province-1, $data->city-1, $data->town-1);
        foreach ($area as $key =>$item) {
            $data->$key = $item;
        }
        return view('patient.show',['data'=>$data]);
    }

    public function patientBookUpdate($id)
    {
    	               
    	return view('Patient.bookUpdate');
    }

    //患者报表
    public function patientReport(Request $req)
    {
        $date = $req->date ?: time();
        $data = array();
        $monthStart = date('Y-m-01', $date);
        $monthEnd =  date('Y-m-d', strtotime('last day of '.$monthStart));
        $patients = Patient::whereBetween('add_time', [$monthStart, $monthEnd]);
        if($req->doctor) $patients->where('doctor',(int)$req->doctor);
        $patients = $patients->get()->toArray();
        $web = 0;
        $another = 0;
        $sum = 0;
        //每一天的总数纪录在这个数组里面 在模版里面进行计算太复杂
        $sum_item_arr = [];
        foreach ($patients as $item) {
            $date_index = formatDate($item['add_time'], 'Y-m-d');
            $sum += 1;
            if($item['book_id'] > 0) {
                $data[$date_index]['web'][] = $item;
                $web += 1;
            } else {
               $data[$date_index]['another'][] = $item;  
               $another += 1;                      
            }
            if(!isset($sum_item_arr[$date_index])) $sum_item_arr[$date_index] = 0;
            $sum_item_arr[$date_index] += 1;
            if(!isset($data[$date_index]['web'])) $data[$date_index]['web'] = null;
            if(!isset($data[$date_index]['another'])) $data[$date_index]['another'] = null;
        }

        return view('Patient.report.index', ['data'=>$data,'web'=>$web,'another'=>$another, 'sum'=>$sum, 'item_sum'=>$sum_item_arr]);
    }

    //患者统计
    public function statistics()
    {
        return view('Patient.statistics.index');
    }
    
}
