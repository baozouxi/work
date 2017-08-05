<?php

namespace App\Http\Controllers\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CallBackController;
use App\Models\Appointment;
use App\Models\Track;

/**
 * 预约回访控制器
 */
class TrackController extends Controller
{
    

    public function index()
    {
        $users = getAuxiliary()['users'];
        $data = Track::orderBy('add_time','desc')->get();
        $count = Track::count();
        $ids = array();
        foreach ($data as $item) {
            $ids[] = $item->book_id;
        }

        $AppData = Appointment::whereIn('id', $ids)->get(['id','name']);

        foreach ($data as &$dataItem) {
            $dataItem->admin_id = isset($users[$dataItem->admin_id]) ? $users[$dataItem->admin_id] : '----';
            foreach ($AppData as $appItem) {
                if ($dataItem->book_id == $appItem->id)  $dataItem->name = $appItem->name; 
            }
        }


        return view('book.track.index', ['data'=>$data,'count'=>$count]);
    }


    public function show(Request $req, $id)
    {


    	$error = ['code'=>'1', 'msg'=>'非法操作', 'time'=>date('Y-m-d H:i:s')];
    	
        if(!$aModel = $this->getData($id)) return $error;

        session(['track_book_id'=>$id]);

        $TrackData = Track::where('book_id', $id)->get();

        if($req->m) return view('book.track.show2', ['AppData' => $aModel,'TrackData'=>$TrackData]);

    	return view('book.track.show', ['AppData' => $aModel,'TrackData'=>$TrackData]);
    	
    }

    public function create(Request $req)
    {
        $error = ['code'=>'1', 'msg'=>'非法操作', 'time'=>date('Y-m-d H:i:s')];
        
        if(!$id = $req->session()->pull('track_book_id')) return $error;

        if(!$aModel = $this->getData($id)) return $error;
    
    	return view('book.track.create',['AppData'=>$aModel]);
    }


    public function edit(Request $req, $id)
    {

        $id = (int)$id;
        $bookId = $req->session()->pull('track_book_id');
        if(!$aModel = $this->getData($bookId)) return ['code'=>'1', 'msg'=>'该预约不存在，请刷新后重试', 'time'=>date('Y-m-d H:i:s')];
        if(!$TrackData = Track::find($id)) return ['code'=>'1', 'msg'=>'该回访不存在，请刷新后重试', 'time'=>date('Y-m-d H:i:s')];
        return view('book.track.edit',['trackData'=>$TrackData, 'AppData'=>$aModel]);
    }



    public function update(Request $req, $id)
    {
        $id = (int)$id;
        $this->validate($req, [
            'content' => 'required|min:10|string',
            'book_id' => 'required|min:1|numeric',
            'filepath' => 'nullable|string',
            'state' => 'nullable|numeric|max:1',
            'postdate' => 'required|date|after_or_equal:today'
        ]);
        $data = $req->all();
        $trackModel = Track::find($id);
        $trackModel->next_time = $data['postdate'];
        $trackModel->content  = $data['content'];

        if(!$res = $trackModel->save() ) return ['code'=>'1', 'msg'=>'更新失败，请稍后重试', 'time'=>date('Y-m-d H:i:s')];

        return ['code'=> '0', 'msg'=>route('booktrack.show', ['id'=>$data['book_id']]), 'time'=>date('Y-m-d H:i:s')];

    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'content' => 'required|min:10|string',
            'book_id' => 'required|min:1|numeric',
            'filepath' => 'nullable|string',
            'state' => 'nullable|numeric|max:1',
            'postdate' => 'required|date|after_or_equal:today'
            ]);
        $data = $req->all();
        $data['next_time'] = $data['postdate'];
        $data['admin_id'] = '1';
        if(!$model = Track::create($data)) return ['code'=>'1', 'msg'=> '回访添加失败，请稍后重试', 'time'=>date('Y-m-d H:i:s')]; 
        return ['code'=>'0', 'msg'=> route('booktrack.show', ['id'=>$data['book_id']]), 'time'=>date('Y-m-d H:i:s') ];
    }



    private function getData($id)
    {
        $id = (int)$id;
        if (!$aModel = Appointment::find($id)) return false;
        $area = CallBackController::area($aModel->province-1, $aModel->city-1, $aModel->town-1);
        foreach ($area as $key => $val) {
            $aModel->$key = $val;
        }
        return $aModel;
    }



}
