<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\CallBackController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FieldsController;
use App\Http\Requests\AppointRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Appointment;
use App\Models\Chatlog;
use App\Models\Patient;
use App\Models\Way;
use App\Models\Track;
use App\Models\Nav;
use App\Models\Field;
use App\Models\Disease;
use App\Models\Doctor;
use DB;
use Excel;
use Illuminate\Http\Request;

class BookController extends Controller {

	public function index() 
	{

		
		$appointData = Appointment::orderBy('add_time', 'desc')->paginate('20');
		$count = Appointment::count();
		$fieldUrl = route('fields.create');
		if($fields = Field::where('admin_id', '1')->where('type', '1')->first()) $fieldUrl = route('fields.edit', ['id'=>$fields->id]);
		list($appointData, $fields_list) = $this->reduceArr($appointData);
		return view('Book.index', ['data' => $appointData, 'count' => $count, 'fieldUrl'=>$fieldUrl, 'fields'=>$fields_list]);
	}


	public function today()
	{
		$start = date('Y-m-d 00:00:00', time());
		$end = date('Y-m-d 23:59:59', time());

		$apps = Appointment::whereBetween('postdate', [$start,$end])->get();

		$count = Appointment::whereBetween('postdate', [$start,$end])->count();
		$apps = $this->reduceArr($apps);

		return view('Book.index', ['data'=>$apps, 'count'=>$count]);
	}


	public function tomorrow()
	{
		$start = date('Y-m-d 00:00:00', strtotime('tomorrow'));
		$end = date('Y-m-d 23:59:59', strtotime('tomorrow'));

		$apps = Appointment::whereBetween('postdate', [$start,$end])->get();

		$count = Appointment::whereBetween('postdate', [$start,$end])->count();
		$apps = $this->reduceArr($apps);

		return view('Book.index', ['data'=>$apps, 'count'=>$count]);
	}

	//预约库存
	public function residue()
	{
		$start = date('Y-m-d 00:00:00', time());
		$apps = Appointment::where('postdate', '>=', $start)->where('is_hospital', '0')->get();
		$apps = $this->reduceArr($apps);
		$count = Appointment::where('postdate', '>=', $start)->where('is_hospital', '0')->count();
		return view('book.index', ['data'=>$apps, 'count'=>$count]);
	}

	private function reduceArr($appointData)
	{	
		//显示项权限
		$fields_list = array('id'=>['name'=>'编号', 'width'=>'50'],'add_time'=>['name'=>'添加时间', 'width'=>'120'], 'name'=>['name'=>'姓名', 'width'=>'*']);
		$admin_fields = Field::where('admin_id', '1')->where('type', '1')->first();
		if ($admin_fields) {
			$origin_fields = FieldsController::getFields('1');
			$admin_fields = array_flip(unserialize($admin_fields->fields));
			foreach ($admin_fields as $key=>&$v) {
				if(isset($origin_fields[$key])) $v = $origin_fields[$key];
			}
			$fields_list = array_merge($fields_list, $admin_fields);
		}




		//ID数组
		$ids = array();

		list($diseases, $doctors, $users, $ways) = array_values(getAuxiliary()); 

		foreach ($appointData as &$item) {
			$item->status = '1';

			//此处可以做权限判断 是否有权限生成病人 以便生成路由
			$item->url = route('book.edit', ['id' => $item->id]);

			//$item->url = route('patient.create', ['bookId' => $item->id]);
			// 此处加判断以更改编辑患者入口
			// if($item->is_hospital !== '0'){
	  //               $patient = Patient::where('book_id',$item->id)->first();
	  //               $item->url = route('patient.edit', ['id'=>$patient->id]);
	  //        }

			if (strtotime($item->postdate) < strtotime('today')) {
				$item->status = '3';
			}

			if ($item->is_hospital == '1') {
				$item->status = '2';

			}
			$ids[] = $item->id;
			$area = CallBackController::area($item->province - 1, $item->city - 1, $item->town - 1);
			$item->province = $area['province'];
			$item->city = $area['city'];
			$item->town = $area['town'];
			$item->dis = isset($diseases[$item->dis])? $diseases[$item->dis] : '----' ;
			$item->way  = isset($ways[$item->way]) ? $ways[$item->way] : '----' ;
			$item->admin_id  = isset($users[$item->admin_id]) ? $users[$item->admin_id] : '----' ;
		}
		$Track = Track::whereIn('book_id', $ids)->orderBy('next_time', 'desc')->get();

		$ChatLog = Chatlog::whereIn('book_id', $ids)->get();

		dd($appointData);
		foreach ($appointData as &$item) {
			$item->track = [];
			foreach ($Track as $trackItem) {
				if ($trackItem->book_id == $item->id) {
					$arr[$item->id][] = $trackItem;
					$item->track = $arr[$item->id];
				}
			}

			foreach ($ChatLog as $chatItem) {
				if ($chatItem->book_id == $item->id) {
					$item->chatlog = $chatItem->id;
				}

			}
		}
		
		return [$appointData, $fields_list];
	}


	public function create(Request $req) 
	{
		$diseases = disease::where('is_use', '1')->get();
		$ways = Way::where('is_use', '1')->get();
		$error = '';

		if($ways->isEmpty()) $error = '错误：请保留只是一个预约途径选项并选择启用';
		if($diseases->isEmpty()) $error = '错误：请保留只是一个病种选项并选择启用';

		if($error) return view('Book.error', ['error'=>$error]); 

		return view('Book.create', ['ways'=>$ways, 'diseases'=>$diseases]);
	}

	public function show($id) 
	{
		$id = (int) $id;
		if (!$data = Appointment::find($id)) {
			return ['code' => '1', 'msg' => '该预约不存在，请刷新后重试', 'time' => date('Y-m-d H:i:s')];
		}

		return view('book.show', ['data' => $data]);
	}

	public function edit($id) 
	{
		$id = (int) $id;
		if (!$data = Appointment::find($id)) {
			throw new ModelNotFoundException('预约号' . $id . '不存在');
		}

		$log = Chatlog::where('book_id', $id)->first();
		return view('book.edit', ['data' => $data, 'logData' => $log]);
	}

	public function update(BookUpdateRequest $req, $id) 
	{
		$id = (int) $id;
		$data = $req->all();

		if (!$model = Appointment::find($id)) {
			return ['code' => '1', 'msg' => '该预约不存在，请刷新后重试', 'time' => date('Y-m-d H:i:s')];
		}

		try {

			DB::beginTransaction();

			if (!$model->update($data)) {
				throw new \Exception('数据更新失败');
			}

			if ($data['chatlog'] !== '') {

				$chatlogArr = ['log' => $data['chatlog']];
				if (!$model = Chatlog::updateOrCreate(['book_id' => $id], $chatlogArr)) {
					throw new \Exception('聊天记录更新失败');
				}

			}

			if ($model->is_hospital == '1') {

				if (!$patient = Patient::where('book_id', $id)->first()) {
					throw new \Exception("患者不存在");
				}

				unset($data['id']);
				if (!$patient->update($data)) {
					throw new \Exception('患者修改失败');
				}

			}

			DB::commit();

		} catch (\Exception $e) {

			DB::rollback();

			return ['code' => '1', 'msg' => $e->getMessage(), 'time' => getNow()];
		}

		return ['code' => '0', 'msg' => route('book.index'), 'time' => date('Y-m-d H:i:s')];

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

		try {

			// 带添加admin_id
			$data['admin_id'] = '1';
			$data['res'] = '0';
			if (!$id = Appointment::create($data)->id) {
				throw new \logicException('预约添加失败，请联系管理员');
			}

			if (isset($chatlog)) {
				$chatlogArr = ['book_id' => $id, 'log' => $chatlog];
				if (!$id = Chatlog::create($chatlogArr)->id) {
					throw new \logicException('聊天记录添加失败,请联系管理员');
				}

			}
			return ['code' => '0', 'msg' => route('book.index'), 'time' => date('Y-m-d H:i:s')];

		} catch (\logicException $e) {

			return ['code' => '1', 'msg' => $e->getMessage(), 'time' => date('Y-m-d H:i:s')];

		}

	}





	public function sheetSearchByMonth(Request $req)
	{

	}


	public function getChatlog($id) {
		$id = (int) $id;
		$data = Chatlog::find($id);
		return view('book.chatlog', ['data' => $data]);
	}

	public function exportHtml()
	{
		$months =	Appointment::all(DB::raw('distinct DATE_FORMAT(postdate, "%Y-%m") as postdate'));
		return view('book.export', ['months'=>$months]);
	}

	public function export(Request $req)
	{
		$this->validate($req, [
			'type' => 'numeric|required|min:0',
			'month' => 'date|required',
			]);
	
		$start = date('Y-m-01 00:00:00', strtotime($req->month));
		$end = date('Y-m-d 23:59:59', strtotime("last day of $start "));
		$Appos = Appointment::whereBetween('postdate', [$start, $end]);

		$fields = ['编号'=>'id','添加时间'=>'add_time','姓名'=>'name','性别'=>'gender',
                    '年龄'=>'age','电话'=>'phone','城市'=>'city','地区'=>'town',
                    '病种'=>'disease','预约时间'=>'postdate','途径'=>'way',
                    '操作员'=>'admin_id'];
		switch ($req->type) {
			case '0':
				$Appos = $Appos->get();
				break;
			case '1':
				$Appos = $Appos->where('is_hospital', '0')->get();
				break;
			case '2':
				$Appos = $Appos->where('is_hospital', '1')->get();
				break;
			
		}

		$Appos = $this->reduceArr($Appos);

		$sheet_arr = [];

		foreach ($fields as $field) {
			foreach ($Appos as $app) {
				$sheet_arr[$app->id][] = $app->$field;
			}
		}

		array_unshift($sheet_arr, array_keys($fields));


        Excel::create("{$req->month}月预约报表",function($excel)use($sheet_arr){

        $excel->sheet('sheet',function($sheet)use($sheet_arr){
           // 另外还可以用：$sheet -> with()或者$sheet -> fromArray()
            $sheet ->rows($sheet_arr);
        });
        })->export('xls');

	}
	




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

}
