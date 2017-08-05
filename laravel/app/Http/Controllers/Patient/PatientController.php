<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CallBackController;
use App\Http\Controllers\FieldsController;
use App\Models\Patient;
use App\Models\PatientTrack;
use App\Models\Appointment;
use App\Models\Take;
use App\Models\Disease;
use App\Models\Doctor;
use App\Models\Ad;
use App\Models\Way;
use App\Models\User;
use App\Models\Field;
use DB;
use Excel;

class PatientController extends Controller
{
    
	// 列表显示
    public function index(Request $req)
    {
        $data  = Patient::orderBy('add_time','desc')->paginate('20');
        $count = Patient::count(); 
        $fieldUrl = route('fields.create', ['type'=>'2']);
        if($fields = Field::where('admin_id', '1')->where('type', '2')->first()) $fieldUrl = route('fields.edit', ['id'=>$fields->id]);
        list($data, $fields_list)  = $this->reduceArr($data);
    	return view('Patient.index', ['data'=>$data, 'count'=>$count, 'fields_list'=>$fields_list, 'fieldUrl'=>$fieldUrl]);
    }


    //重构数组  
    public function reduceArr($data)
    {

                //显示项权限
        $fields_list = array('id'=>['name'=>'编号', 'width'=>'50'],'add_time'=>['name'=>'添加时间', 'width'=>'120'], 'name'=>['name'=>'姓名', 'width'=>'*']);
        $admin_fields = Field::where('admin_id', '1')->where('type', '2')->first();
        if ($admin_fields) {
            $origin_fields = FieldsController::getFields('2');
            $admin_fields = array_flip(unserialize($admin_fields->fields));

            foreach ($admin_fields as $key=>&$v) {
                if(isset($origin_fields[$key])) $v = $origin_fields[$key];
            }

            $fields_list = array_merge($fields_list, $admin_fields);

        }

        list($diseases, $doctors, $users, $ways, $ads) = array_values(getAuxiliary());
        $takes = Take::groupBy('patient_id')->select(DB::raw('sum(check_cost+treatment_cost+drug_cost+hospitalization_cost) as sum'), 'patient_id')->get();
        $ids = array();
        foreach ($data as &$item) {
            foreach($takes as $take_item){
                if($take_item->patient_id == $item->id) $item->sum = $take_item->sum;
            }
            $ids[] = $item->id;
            list($item->province, $item->city, $item->town) = array_values(CallBackController::area($item->province-1, $item->city-1, $item->town-1));
            $item->dis =  isset($diseases[$item->dis]) ?  $diseases[$item->dis] : '----';
            $item->dep = isset($doctors[$item->dep]) ? $doctors[$item->dep] : '----';
            $item->admin_id = isset($users[$item->admin_id]) ? $users[$item->admin_id] : '----';
            $item->add_time = formatDate($item->add_time, 'Y-m-d H:i');
            $item->gender = $item->gender == '1' ? '男' : '女' ;
            if ($item->book_id > 0) {
                $item->ads = isset($ads[$item->book_id]) ? $ads[$item->book_id] : '----' ;
            } else {
                $item->ads = isset($ways[$item->book_id]) ? $ways[$item->book_id] : '----' ;
            }
        }
        unset($doctors);
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
        
        $data_arr = [];
        foreach ($data as $key => $value) {
            foreach ($fields_list as $name => $item) {
                switch ($name) {
                    case 'gender':
                        $value->gender = '<u>'.$value->gender.'</u>';
                        $data_arr[$key][$name] = '<td><center>'.$value->gender.'</center></td>';  
                        break;

                    case 'name':
                        $name = $value->name;
                        $value->name = '<u>'.$name.'</u>';
                        if($value->book_id != '0') $value->name = '<i>'.$name.'</i>'; 
                        $info_html = '';
                        if(check_node('patient_info')) $info_html = 'title="“'.$name.'”的详细资料" onclick="msgbox(this,600);" url="'.route('patient.show', ['id'=>$value->id]).'" style="cursor:pointer;" class="icon"';
                        if(check_node('patient_edit')) $value->name =  '<a href="javascript:void(0);" onclick="fastH(this,\'main\')" url="'.route('patient.edit', ['id'=>$value->id]).'">'.$value->name.'</a>';                      
                        $data_arr[$key][$name] = '<td><span '.$info_html.'>Ĵ</span>'.$value->name.'</td>';
                        break;

                    case 'sum':
                        if($value->sum == null || !check_node('take_show') ) $value->sum = 0;
                        if (check_node('take_edit')) {
                            $value->sum = '<a href="javascript:void(0);" onclick="fastH(this,\'main\')" url="'.route('takeWithInfo',['patientId'=>$value->id]).'">'.$value->sum.'</a>';
                        } else {
                            $value->sum = '<u>'.$value->sum.'</u>';
                        }
                        $data_arr[$key][$name] = '<td><center>'.$value->sum.'</center></td>';
                        break;

                    case 'track':
                        $track = '<span>没有记录</span>';
                        if(count($value->tracks)) $track = '<u>'.formatDate($value->tracks['0']['next_time'], 'm-d H:i').'('.count($value->tracks).')</u>';
                        if(check_node('track_edit')) $track = '<a href="javascript:void(0);" onclick="fastH(this,\'main\')" url="'.route('trackWithInfo', ['id'=>$value->id]).'">'.$track.'</a>';
                        $data_arr[$key][$name] = '<td><center>'.$track.'</center></td>';
                        break;

                    case 'do':
                        $data_arr[$key][$name] = '<td><center>-</center></td>';
                        break;
                    
                    default:
                        $data_arr[$key][$name] = '<td><center>'.$value->$name.'</center></td>';  
                        break;
                }
            }
        }
        //dd($data_arr);
        return [$data_arr, $fields_list];
    }

    public function create(Request $req)
    {
        if(isset($req->bookId)) $book = Appointment::find((int)$req->bookId) ?: '';
        //病历号 并存入session用以防止重复提交
        $medical_num = mt_rand(100,999).time();
        $error = '';
        $req->session()->put('medical_num', $medical_num);
        $dis = Disease::all();
        $doctors = Doctor::all();
        $ads  = Ad::all();
        if($dis->isEmpty())  $error = '错误：请至少添加一个病种选项并且启用它';
        if($doctors->isEmpty())  $error = '错误：请至少添加一个医生选项并且启用它';

        if($error)  return view('patient.error',['error'=>$error]);

        if(isset($book) && $book !== '' ) return view('patient.createWithBook', ['medical_num'=>$medical_num,'book'=>$book]);

        if($ads->isEmpty()) return view('patient.error',['error'=>'错误：请至少添加一个来源媒介选项并且启用它']);

    	return view('Patient.create', ['medical_num'=>$medical_num, 'diseases'=>$dis,'doctors'=>$doctors,'ads'=>$ads]);
    }

    public function store(PatientStoreRequest $req)
    {

        if(!$req->session()->has('medical_num')) return ['code'=>'1','msg'=>'请勿重复提交','time'=>date('Y-m-d H:i:s')];
      
        $data = $req->all();
        if($req->has('undate')) $data['undate'] = '0';
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


    //考虑是否开放该功能
    public function destroy($id)
    {
        return code('<em>禁止</em>','0');
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
    public function patientReport(Request $req, $date='', $doctor='0')
    {
        $data = array();
        $date = time();
        
        $months = Patient::all(DB::raw("distinct DATE_FORMAT(add_time, '%Y-%m') as add_time"));
        $doctors = Doctor::all();
        if(strtotime($req->date)) $date = strtotime($req->date);
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


        return view('Patient.report.index', ['data'=>$data,'web'=>$web,'another'=>$another, 'sum'=>$sum, 'item_sum'=>$sum_item_arr, 'doctors'=>$doctors, 'months'=>$months ]);
    }

    //患者统计
    public function statistics(Request $req)
    {
        $key = 'admin_id';
        if($req->has('key')) $key = $req->key;
        $months = Patient::all(DB::raw("distinct DATE_FORMAT(add_time, '%Y-%m') as add_time"));
        $count = Patient::count();
        $patients = Patient::all()->toArray();
        $patients = $this->staReduceArr($patients, $key);
        if($req->has('key')) return view('Patient.statistics.listWithoutNav',['all_count'=>$count,'data'=>$patients]);
        return view('Patient.statistics.index', ['all_count'=>$count,'data'=>$patients, 'months'=>$months]);
    }


    //统计重组数组
    public function staReduceArr($patients,$key='admin_id')
    {
        list ($diseases, $doctors, $users,$ways,$ads) = array_values(getAuxiliary());

        foreach ($patients as &$patient) {
            $patient['gender'] =  $patient['gender']=='1'  ? '男' : '女';
            $patient['admin_id'] = isset($users[$patient['admin_id']]) ? $users[$patient['admin_id']] : '----' ;
            $patient['dis'] =  isset($diseases[$patient['dis']])  ? $diseases[$patient['dis']] : '----' ;
            $patient['dep'] = isset($doctors[$patient['dep']]) ? $doctors[$patient['dep']] : '----' ;
            $patient['admin_id'] = isset($users[$patient['admin_id']]) ? $users[$patient['admin_id']] : '----' ;
            if ($patient['book_id'] == '0') {
                $patient['ads'] = isset($ads[$patient['ads']])? $ads[$patient['ads']] :'----';
            }else{
                $patient['ads'] = isset($ways[$patient['ads']])? $ways[$patient['ads']] :'----';
            }
            list($patient['province'],$patient['city'],$patient['town']) = 
                array_values(CallBackController::area($patient['province']-1,$patient['city']-1,$patient['town']-1));
        }

        $patients = reduceArr($patients, $key);
        $patients = array_map('count', $patients);
        return $patients;
    }

    public function statisByMonth(Request $req)
    {  
        $month = date('Y-m', time());
        $months = Patient::all(DB::raw("distinct DATE_FORMAT(add_time, '%Y-%m') as add_time"));
        $key =  'admin_id';
        if(strtotime($req->month)) $month = $req->month;
        if($req->key) $key = $req->key;
        $monthStart = date('Y-m-01', strtotime($month));
        $monthEnd = date('Y-m-d', strtotime("last day of $monthStart"));
        $count = Patient::whereBetween('add_time', [$monthStart, $monthEnd])->count();
        $patients = Patient::whereBetween('add_time', [$monthStart, $monthEnd])->get()->toArray();
        $patients = $this->staReduceArr($patients, $key);
        if($req->has('key')) return view('Patient.statistics.listWithoutNav',['all_count'=>$count, 
                                                            'data'=>$patients, 
                                                            'current_month'=>$month,
                                                            'months' => $months
                                                            ]);

        return view('Patient.statistics.listSearchByMonth',['all_count'=>$count, 
                                                            'data'=>$patients, 
                                                            'current_month'=>$month,
                                                            'months' => $months
                                                            ]);
    }





    //通过关键字查找
    public function search($key)
    {
        $pattern = '/^[\x7f-\xff]+$/';
        $patients = [];
        $field = '';
        if (preg_match($pattern, $key)) {
            $field = 'name';
            $patients = Patient::where('name', $key)->get();
        } else {

            if (strlen($key) <= 4) {
                $field = 'phone';
                $patients = Patient::where('phone', 'like', '%'.$key)->get();
            } else {
                $field = 'medical_num';
                $patients = Patient::where('medical_num', $key)->get();
            }

        }


        foreach ($patients as $patient) {
            if ($field == 'phone') {
                $patient->$field  =  str_replace($key, '<q>'.$key.'</q>', $patient->$field);
                continue;
            }

            $patient->$field = '<q>'.$patient->$field.'</q>';
        }

        $count = count($patients);
        $data = $this->reduceArr($patients);

        return view('Patient.index', ['data'=>$data, 'count'=>$count]);


    }


    //通过日期查找
    public function searchByMonth(Request $req, $start, $end='')
    {
        $patients = [];
        $start = formatDate($start);
        if($end != '') $end = formatDate($end);
        
        if ($start && $end) {
            $patients = Patient::whereBetween('add_time', [$start,$end])->get();
        }

        if ($start && !$end) {
            $patients = Patient::where('add_time','>',$start)->get();
        }

        $count = count($patients);
        $data = $this->reduceArr($patients);

        return view('Patient.index', ['data'=>$data, 'count'=>$count]);

    }

    //今日到诊
    public function today()
    {
        $begin = date('Y-m-d 00:00:00', time());
        $end = date('Y-m-d 23:59:59', time());
        $patients = Patient::whereBetween('add_time', [$begin, $end])->get();
        $count = count($patients);
        $fieldUrl = route('fields.create', ['type'=>'2']);
        if($fields = Field::where('admin_id', '1')->where('type', '2')->first()) $fieldUrl = route('fields.edit', ['id'=>$fields->id]);
        list($data, $fields_list)  = $this->reduceArr($patients);
        return view('Patient.index', ['data'=>$data, 'count'=>$count, 'fields_list'=>$fields_list, 'fieldUrl'=>$fieldUrl]);
    }

    //到期回访
    public function timeToTrack()
    {
     
        $start = strtotime(date('Y-m-d 00:00:00', time()));
        $end = strtotime(date('Y-m-d 23:59:59', time()));
        $patient_id_arr = [];
        $tracks = PatientTrack::groupBy('patient_id')->get([DB::raw('max(next_time) as next_time'),'patient_id']);
        foreach ($tracks as $track) {
            if($start <= strtotime($track->next_time) && strtotime($track->next_time) <= $end) {
                $patient_id_arr[] = $track->patient_id;
            } 
        }
        $patients = Patient::whereIn('id', $patient_id_arr)->get();
        $count = count($patients);
        $fieldUrl = route('fields.create', ['type'=>'2']);
        if($fields = Field::where('admin_id', '1')->where('type', '2')->first()) $fieldUrl = route('fields.edit', ['id'=>$fields->id]);
        list($data, $fields_list)  = $this->reduceArr($patients);
        return view('Patient.index', ['data'=>$data, 'count'=>$count, 'fields_list'=>$fields_list, 'fieldUrl'=>$fieldUrl]);
    }
    
    //导出表单
    public function exportHtml()
    {
        $months = Patient::all(DB::raw('distinct date_format(add_time, "%Y-%m") as add_time'));
        return view('patient.export', ['months'=>$months]);
    }


    //数据导出
    public function export(Request $req)
    {
        $this->validate($req, [
            'type' => 'required|numeric|min:0',
            'month' => 'required|date'
            ]);

        $start = date('Y-m-01 00:00:00', strtotime($req->month));
        $end = date('Y-m-d 23:59:59', strtotime("last day of $start"));
        $field = ['编号'=>'id','时间'=>'add_time','姓名'=>'name','性别'=>'gender',
                    '年龄'=>'age','电话'=>'phone','城市'=>'city','地区'=>'town','病种'=>'dis','医生'=>'dep','回访时间'=>'track_time','操作员'=>'admin_id'];
        $patients = Patient::whereBetween('add_time', [$start, $end]);

        switch ($req->type) {
            case '0': //全部
                $patients = $patients->get();
                break;
            case '1':  //自己到诊
                $patients = $patients->where('booK_id','0')->get();
                break;
            case '2': //预约到诊
                $patients = $patients->where('book_id', '!=', '0')->get();
                break;
        }



        $patients = $this->reduceArr($patients);

        $field_name = array_keys($field);

        $sheet_arr = [];
        foreach ($field as $key) {
            foreach($patients as $patient){
                if ($key == 'track_time' && !empty($patient['tracks'])) {
                    $sheet_arr[$patient->id][] = $patient['tracks']['0']['next_time'];
                    continue;
                }
                $sheet_arr[$patient->id][] = $patient->$key;
            }
        }

        array_unshift($sheet_arr, $field_name);
        //dd($sheet_arr);

        Excel::create("{$req->month}月患者报表",function($excel)use($sheet_arr){

        $excel->sheet('sheet',function($sheet)use($sheet_arr){
           // 另外还可以用：$sheet -> with()或者$sheet -> fromArray()
            $sheet ->rows($sheet_arr);
        });
        })->export('xls');
    }


}
