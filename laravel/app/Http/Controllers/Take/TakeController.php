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

    public function today()
    {
        $start = date('Y-m-d 00:00:00', time());
        $end = date('Y-m-d 23:59:59', time());

        $takes = Take::leftJoin('patients', 'takes.patient_id', '=', 'patients.id')
                        ->whereBetween('takes.add_time', [$start, $end])
                        ->orderBy('add_time','desc')
                        ->get(['patients.name','takes.*', 'patients.id as patientId']);
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


    /*消费统计 默认不分月份展示所有数据的统计
    public function statistics()
    {   

        $take =  Take::all()->toArray();
        $patients = Patient::all()->toArray();
        $all_reHospital_count = 0; //总复诊人数
        $patient_arrive_count = 0; //总到诊数
        $patient_cost_count = 0; //总就诊数
        $key = 'admin_id';   
        $take_sum = 0; //总消费
        $data = []; //存放统计数据
        $reHospital_take_sum = 0; //总复诊消费 不把第一次消费算进去 所以需要一个数组来进行数组暂存 
        $reHosptial_take_arr = []; //用于统计
        

        //获取复诊的消费patient_id
        $patient_id_count = array_count_values(array_column($take, 'patient_id')); 
        $reHospital_Patient_id_arr = [];
        foreach ($patient_id_count as $patient_id => $count) {
            if($count>=2)  $reHospital_Patient_id_arr[] = $patient_id;
        }

        $all_reHospital_count = count($reHospital_Patient_id_arr);

        list($diseases, $doctors, $users, $ways, $ads) = array_values(getAuxiliary());

        //根据表头重组数据
        foreach ($take as &$item) {
            //因为患者录入admin_id和消费录入admin_id可能不一样  但我们统计数据是以患者录入admin_id为准 故将所有消费admin_id替换 方便统计
            foreach ($patients as $patient) {
                if ($item['patient_id'] == $patient['id']) {
                    $item['admin_id'] = $patient['admin_id'];
                }
            }
            $item['admin_id'] =  isset($users[$item['admin_id']]) ?  $users[$item['admin_id']] : '----';
            $item_sum = $item['check_cost']+$item['treatment_cost']+ $item['drug_cost']+$item['hospitalization_cost'];
            $take_sum += $item_sum;
            if(!isset($data[$item[$key]]['sum'])) $data[$item[$key]]['sum'] = 0;
            if(!isset($data[$item[$key]]['reHospital'])) $data[$item[$key]]['reHospital'] = [];
            $data[$item[$key]]['sum'] += $item_sum;
            if (in_array($item['patient_id'], $reHospital_Patient_id_arr)) {
                $reHosptial_take_arr[$item['patient_id']][$item['add_time']] = $item_sum;
                $data[$item[$key]]['reHospital'][$item['patient_id']][$item['add_time']] = $item_sum;
            }
        }

   
        //计算总复诊费用 去除最开始的消费 剩下的就是复诊的费用
        foreach ($reHosptial_take_arr as $reItem) {
            $min = min(array_keys($reItem));
            unset($reItem[$min]);
            $reHospital_take_sum += array_sum($reItem);
        }

        $patient_arrive_count = count($patients); //总到诊 即总病人
        $patients = reduceArr($patients, $key); //重组数组
        $patient_cost_count =  count(array_unique(array_column($take, 'patient_id'))); //总就诊数


        // 就诊人数统计 即消费patient_id的个数
        $cost_patient_count = [];
        foreach ($take as $take_item) {
            $cost_patient_count[$take_item[$key]][] = $take_item['patient_id'];
        }

        $cost_patient_count  = array_map('array_unique', $cost_patient_count);

       
        // 再次过滤数组 重组数据
        foreach ($data as $data_key => $data_item) {
            $data[$data_key]['patient_cost_count'] = count($cost_patient_count[$data_key]);
            $data[$data_key]['patient_count'] = !isset($patients[$data_key]) ? 0 : count($patients[$data_key]);
            $data[$data_key]['reHospital_count'] = count($data_item['reHospital']);
            $data[$data_key]['reHospital_sum'] = 0;
            foreach ($data_item['reHospital'] as  &$v) {
                $min = min(array_keys($v));
                unset($v[$min]);
                $data[$data_key]['reHospital_sum'] += array_sum($v);
            }
            unset($data[$data_key]['reHospital']);

        }   
      
        return view('Take.statistics.index',['all_patient_count'=>$patient_arrive_count,
                                            'patient_cost_count' => $patient_cost_count,
                                            'take_sum' => $take_sum,
                                            'all_reHospital_count'=>$all_reHospital_count,
                                            'reHospital_take_sum'=>$reHospital_take_sum,
                                            'data' => $data]);
    }
    */
   

    public function statistics(Request $req)
    {

        $patients = Patient::all()->toArray();
        $takes = Take::all()->toArray();
        $months = Take::all(DB::raw('distinct DATE_FORMAT(add_time, "%Y-%m") as add_time'));
        $key = 'admin_id';
        if($req->has('key')) $key = $req->key;

        list($total, $data_arr) = $this->reduceArr($patients, $takes, $key);

        if($req->has('key')) return view('Take.statistics.listWithoutNav', ['total'=>$total, 'data'=>$data_arr]);
       return view('Take.statistics.index', ['total'=>$total, 'data'=>$data_arr, 'months'=>$months]);
    }


    private function reduceArr($patients, $takes, $key)
    {

                //数据总计
        $total['take_sum'] = 0; //总消费
        $total['all_reHospital_count'] = 0; // 总复诊人数
        $total['reHospital_take_sum'] = 0; //复诊总消费
        $total['all_patient_count'] = count($patients); //到诊人数
        $total['all_patient_cost_count'] = 0; //总就诊人数
        $takes = reduceArr($takes, 'patient_id'); //以病人ID为键重组数组


        $total['all_patient_cost_count'] = count($takes);

        //该数组保存复诊的patient_id
        $reHospital_id_arr = array_filter(array_map('count', $takes), function($data){
            if($data > 1) return true;
            return false;
        });
        $reHospital_id_arr = array_keys($reHospital_id_arr);
        //总复诊人数
        $total['all_reHospital_count'] = count($reHospital_id_arr);

        $take_data = [];  //用于存放统计数据
  
        //对病人数据的id替换成对应的值
     
        list($diseases, $doctors, $users, $ways, $ads) = array_values(getAuxiliary());

  
        foreach ($patients as &$patient) {
            if (in_array($patient['id'], array_keys($takes))) {
                $patient['add_time'] = $takes[$patient['id']]['0']['add_time']; //因为统计数据以消费记录为准 故将添加时间替换为消费时间
            }
         
            $patient['gender'] =  $patient['gender'] == '1' ? '男' : '女' ;

            list($patient['province'],$patient['city'],$patient['town']) = array_values(CallbackController::area(
                $patient['province']-1,$patient['city']-1,$patient['town']-1));
            $patient['dep'] = isset($doctors[$patient['dep']]) ? $doctors[$patient['dep']] : '未知' ;

            $patient['admin_id'] = isset($users[$patient['admin_id']]) ? $users[$patient['admin_id']]  : '未知' ; 
            $patient['dis'] = isset($diseases[$patient['dis']]) ? $diseases[$patient['dis']]  : '未知' ; 
            if ($patient['book_id'] != '0') {
                $patient['ads'] = isset($ways[$patient['ads']]) ?$ways[$patient['ads']] : '未知';
            }  else {
                $patient['ads'] = isset($ads[$patient['ads']]) ?$ads[$patient['ads']] : '未知';
            } 
        }
        


        // 复诊的定义为除开第一次消费  其余的都为复诊   所以可以去掉最早的一条消费 进行sum
        foreach ($takes as $patient_id => $take) {
            foreach ($take as $item) {
                $item_sum = $item['check_cost']+$item['treatment_cost']+$item['drug_cost']+$item['hospitalization_cost'];
                $total['take_sum'] += $item_sum;
                $take_data[$patient_id][$item['add_time']] = $item_sum;
            }

        }

        //根据字段名重组数组
        $data_arr = [];

        $patients = reduceArr($patients, $key);



        foreach ($patients as $field => $v) {
            if(!isset($data_arr[$field]['take_sum'])) $data_arr[$field]['take_sum'] = 0; //总消费
            if(!isset($data_arr[$field]['patient_cost_count'])) $data_arr[$field]['patient_cost_count'] = 0; //就诊人数
            if(!isset($data_arr[$field]['patient_count'])) $data_arr[$field]['patient_count'] = 0;  //到诊人数
            if(!isset($data_arr[$field]['reHospital_count'])) $data_arr[$field]['reHospital_count'] = 0; //复诊人数
            if(!isset($data_arr[$field]['reHospital_take_sum'])) $data_arr[$field]['reHospital_take_sum'] = 0; //复诊消费
            foreach ($v as $item) {

                if(in_array($item['id'], array_keys($takes))) $data_arr[$field]['patient_cost_count'] += 1;

                $data_arr[$field]['patient_count'] += 1;
                if(isset($take_data[$item['id']])){
                    $data_arr[$field]['take_sum'] += array_sum($take_data[$item['id']]); 
                }
                // 统计复诊消费
                if(in_array($item['id'], $reHospital_id_arr)) {
                    $data_arr[$field]['reHospital_count']  += 1;
                    $min = min(array_keys($take_data[$item['id']]));
                    unset($take_data[$item['id']][$min]);
                    $data_arr[$field]['reHospital_take_sum'] += array_sum($take_data[$item['id']]);
                    $total['reHospital_take_sum'] += array_sum($take_data[$item['id']]);
                }
               
            }
        }

        //排序
        ksort($data_arr);
        return [$total, $data_arr];
    }



    public function staSearchByMonth(Request $req)
    {
        $key = 'admin_id';
        $month = date('Y-m', time());     
        $months = Take::all(DB::raw('distinct DATE_FORMAT(add_time, "%Y-%m") as add_time'));   
        if($req->has('key')) $key = $req->key;
        if(strtotime($req->month)) $month = $req->month;
        $monthStart = date('Y-m-01', strtotime($month));
        $monthEnd = date('Y-m-d', strtotime("last day of $monthStart"));
        $takes = Take::whereBetween('add_time', [$monthStart, $monthEnd])->get()->toArray();
        $patient_id_arr = array_column($takes, 'patient_id');
        $patients = Patient::whereIn('id', $patient_id_arr)->get()->toArray();
        list($total, $data_arr) = $this->reduceArr($patients, $takes, $key);
        if($req->has('month') && !$req->has('key')) return view('Take.statistics.listSearch', ['total'=>$total, 'data'=>$data_arr, 'months'=>$months, 'current_month'=>$month]);
        return view('Take.statistics.listWithoutNav', ['total'=>$total, 'data'=>$data_arr]);
    }
}
