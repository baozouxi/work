<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Requests\AppointRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CallBackController;
use Illuminate\Support\Facades\Input;
use App\Models\Appointment;
use App\Models\Chatlog;
use App\Models\Patient;
use App\Models\Track;
use Redis;
use DB;

class BookController extends Controller
{
    
    public function index()
    {

        $appointData = Appointment::orderBy('add_time','desc')->paginate('20');
        $count = Appointment::count();
        //ID数组
        $ids = array();
        foreach ($appointData as &$item) {
            $item->status = '1';

            //此处可以做权限判断 是否有权限生成病人 以便生成路由
            $item->url = route('book.edit', ['id'=>$item->id]);

            //$item->url = route('patient.create', ['bookId' => $item->id]);
            // 此处加判断以更改编辑患者入口
            /*if($item->is_hospital !== '0'){
                $patient = Patient::where('book_id',$item->id)->first();
                $item->url = route('patient.edit', ['id'=>$patient->id]);
            }*/

            if (strtotime($item->postdate) < strtotime('today')) $item->status = '3';
            if ($item->is_hospital == '1') {
                $item->status = '2';

            } 
            $ids[] = $item->id;
            $area = CallBackController::area($item->province-1, $item->city-1, $item->town-1);
            $item->province = $area['province'];
            $item->city = $area['city'];
            $item->town = $area['town'];
        }
        $Track = Track::whereIn('book_id', $ids)->orderBy('next_time', 'desc')->get();
       
        $ChatLog = Chatlog::whereIn('book_id', $ids)->get();
        
        foreach ($appointData as &$item) {
            $item->track = [];
            foreach ($Track as $trackItem) {
                if ($trackItem->book_id == $item->id) {
                    $arr[$item->id][] = $trackItem; 
                    $item->track = $arr[$item->id];
                }
            }

            foreach ($ChatLog as $chatItem) {
                if($chatItem->book_id == $item->id)  $item->chatlog = $chatItem->id;
            }
        }

 
    	return view('Book.index', ['data' => $appointData,'count'=>$count]);
    }

    public function create(Request $req)
    {

    	return view('Book.create');
    }


    public function show($id)
    {
        $id = (int)$id;
        if(!$data = Appointment::find($id)) return ['code'=>'1', 'msg'=>'该预约不存在，请刷新后重试', 'time'=>date('Y-m-d H:i:s')];
        return view('book.show',['data'=>$data]);
    }

    public function edit($id)
    {
        $id = (int)$id;
        if(!$data = Appointment::find($id)) throw new ModelNotFoundException('预约号'.$id.'不存在');
        $log = Chatlog::where('book_id', $id)->first();
        return view('book.edit', ['data'=>$data, 'logData'=>$log]);
    }

    public function update(BookUpdateRequest $req,$id)
    {
        $id = (int)$id;
        $data = $req->all();
        
        if(!$model = Appointment::find($id)) return ['code'=>'1', 'msg'=> '该预约不存在，请刷新后重试', 'time'=>date('Y-m-d H:i:s')];

        try{
            
            DB::beginTransaction();

            if (!$model->update($data)) throw new \Exception('数据更新失败');

            if ($data['chatlog'] !== '') {
              
                $chatlogArr = ['log'=> $data['chatlog']];
                if(!$model = Chatlog::updateOrCreate(['book_id'=>$id], $chatlogArr)) throw new \Exception('聊天记录更新失败');
            }


            if ($model->is_hospital == '1') {
                
                if (!$patient = Patient::where('book_id', $id)->first()) throw new \Exception("患者不存在");
                unset($data['id']);
                if (!$patient->update($data)) throw new \Exception('患者修改失败');
            }

            DB::commit();
       
        } catch(\Exception $e) {
    
            DB::rollback();

            return ['code'=>'1', 'msg'=>$e->getMessage(), 'time'=>getNow()];
        }

        return ['code'=>'0', 'msg'=> route('book.index'), 'time'=>date('Y-m-d H:i:s') ];
        
    }  

    public function store(AppointRequest $req)
    {   
        // 数据验证
        $data = $req->all();
        //聊天记录
        if ($data['chatlog'] !== '') {
            $chatlog = $data['chatlog'];
            unset($data['chatlog']);
        }

        try{
            
            // 带添加admin_id
            $data['admin_id'] = '1';
            $data['res'] = '0';
            if (!$id = Appointment::create($data)->id) throw new \logicException('预约添加失败，请联系管理员');

            if (isset($chatlog)) {    
                $chatlogArr = ['book_id'=> $id, 'log' => $chatlog];
                if(!$id = Chatlog::create($chatlogArr)->id)  throw new \logicException('聊天记录添加失败,请联系管理员');
            }
            return ['code'=>'0', 'msg'=> route('book.index'), 'time'=>date('Y-m-d H:i:s') ];

        } catch(\logicException $e) {    

            return ['code'=>'1', 'msg'=>$e->getMessage(), 'time'=>date('Y-m-d H:i:s')];
        
        }
        
    }


    //预约报表
    public function sheet(Request $req)
    {
        $date = time();
        if($req->date) $date = strtotime($req->date);
        $monthStart = date('Y-m-01', $date);
        $monthEnd = date('Y-m-d', strtotime("last day of $monthStart"));
        $data = Appointment::whereBetween('postdate', [$monthStart, $monthEnd])->get(['is_hospital', 'postdate', 'id'])->toArray();
        $total = array();
        $is_hospital  =  array_filter($data, function($v, $key){
            if($v['is_hospital'] == '1') return $v;
        }, ARRAY_FILTER_USE_BOTH);
        $total['app_sum'] = count($data);
        $total['patient_sum'] = count($is_hospital);
        //当日到
        $sql = "select DATE_FORMAT(p.add_time, '%Y-%c-%d') as add_time,p.id from patients as p";
        $sql .= " join appointments as ap on p.book_id = ap.id";
        $sql .= " where p.add_time between DATE_FORMAT(ap.postdate, '%Y-%c-%d 00:00:00') AND DATE_FORMAT(ap.postdate, '%Y-%c-%d 23:59:59');";
        $on_that_day =  DB::select($sql);

        $total['on_that_day'] = count($on_that_day);
        $on_that_day = array_column($on_that_day, null, 'add_time');

        //拼装数据
        $data_arr = [];
        foreach ($data as $item) {
            $data_arr[formatDate($item['postdate'], 'Y-m-d')][] = $item;
        }
        unset($data);
        $on_that_day_arr = [];
        foreach ($on_that_day as $onItem) {
            $on_that_day_arr[formatDate($onItem->add_time, 'Y-m-d')][] = $onItem;
        }
        unset($on_that_day);
        
        //总到诊率
        $total['arrived'] = $total['app_sum'] == '0' ? '0' : ceil($total['patient_sum']/$total['app_sum']*100);
        //总当日率
        $total['arrive_on_that_day'] = $total['app_sum'] == '0' ? '0' : ceil($total['on_that_day']/$total['app_sum']*100);
 
        //统计结果 便于前台展示  通过遍历将所有数据进行整合 存于另一个数组 以格式化后的日期作为数组索引
        $data_after_filter = array();
        foreach ($data_arr as $date => $onItem) {
            foreach ($onItem as $dateItem) {
                $data_after_filter[$date]['app_sum'] = count($onItem);
                if (!isset($data_after_filter[$date]['patient_sum'])) {
                    $data_after_filter[$date]['patient_sum']  = 0;
                }
                if ($dateItem['is_hospital'] == '1') {
                    $data_after_filter[$date]['patient_sum']  += 1;                                                           
                }
                if (isset($on_that_day_arr[$date])) {
                    $data_after_filter[$date]['on_that_day'] = count($on_that_day_arr[$date]);
                    continue;
                }
                $data_after_filter[$date]['on_that_day'] = 0;
            }
        }
        unset($data_arr);
        //计算当日率 到诊率
        array_walk($data_after_filter, function(&$item){
            $item['arrived'] = $item['app_sum'] == 0 ? 0 : ceil($item['patient_sum']/$item['app_sum']*100);
            $item['arrive_on_that_day'] = $item['app_sum'] == 0 ? 0 : ceil($item['on_that_day']/$item['app_sum']*100);
        });

        return view('Book.sheet',['total' => $total, 'data_arr' => $data_after_filter]);

    }       






    public function getChatlog($id)
    {
        $id = (int)$id;
        $data = Chatlog::find($id);
        return view('book.chatlog', ['data'=>$data]);
    }




}
