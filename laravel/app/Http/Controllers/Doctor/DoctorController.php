<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Disease;

class DoctorController extends Controller
{
    
    public function index()
    {
        $dis = Disease::where('parent_id', '0')->get()->toArray();
        $doc = Doctor::all()->toArray();

        foreach ($dis as &$disItem) {
            foreach ($doc as $docItem) {
                if(!isset($disItem['docs'])) $disItem['docs'] = [];
                if ($disItem['id'] == $docItem['dis_id']) {
                    $disItem['docs'][] = $docItem;
                }
            }
        }

    	return view('Doctor.index',['dis' => $dis]);
    }

    public function create()
    {
        $dis = Disease::where('parent_id', '0')->get();
    	return view('Doctor.create', ['dis'=>$dis]);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'dis_id' => 'required|min:0|integer',
            'name' => 'required|string|min:0'
            ]);
        $data = $req->all();
        $data['admin_id'] = '1';
        if (Doctor::create($data)) {
            return ['code'=>'-4', 'msg'=>'添加成功', 'time'=>getNow()];
        }
        return ['code'=>'1' , '添加失败，请重试', 'time'=>getNow()];
    }

    public function edit()
    {
           
    }

    public function update()
    {

    }


}
