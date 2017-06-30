<?php

namespace App\Http\Controllers\Disease;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Disease;

/**
 * 病种控制器
 */
class DisController extends Controller
{
   	
   	public function index()
   	{
        $data = Disease::orderBy('sort','desc')->get()->toArray();
        $data_arr = [];
        foreach ($data as $key => $item) {
            if ($item['parent_id'] == '0') {
                $data_arr[$item['id']]['top']['name'] = $item['name']; 
                $data_arr[$item['id']]['top']['sort'] = $item['sort']; 
                $data_arr[$item['id']]['top']['is_use'] = $item['is_use']; 
                $data_arr[$item['id']]['child'] = [];
                unset($data[$key]); 
            } 
        }

        foreach ($data as $key => $rawItem) {
            $data_arr[$rawItem['parent_id']]['child'][$key]['name'] = $rawItem['name'];
            $data_arr[$rawItem['parent_id']]['child'][$key]['id'] = $rawItem['id'];
            $data_arr[$rawItem['parent_id']]['child'][$key]['sort'] = $rawItem['sort'];
            $data_arr[$rawItem['parent_id']]['child'][$key]['is_use'] = $rawItem['is_use'];
        }


   		return view('Dis.index', ['data' => $data_arr]);
   	}   
   	
   	public function create()
   	{
        $dis = Disease::where('parent_id', '0')->get();
   	    return view('Dis.create', ['dis' => $dis]);
   	}

   	public function store(Request $req)
   	{
        $this->validate($req, [
            'parent_id' => 'required|min:0|integer',
            'name' => 'required|string'
        ]);
        $data = $req->all();
        $data['admin_id'] = 1;

        if (Disease::create($data))  return ['code'=>'-4', 'msg'=>'提交成功', 'time'=>getNow()]; 	
        return ['code'=>'1', 'msg'=> '提交失败，请重试', 'time'=>getNow()];
    }

   	public function show()
   	{

   	}

   	public function edit($id)
   	{
        $current_data = Disease::find($id);
        $dis = Disease::where('parent_id', '0')->where('id', '<>', $id)->get();
        return view('Dis.edit', ['current' => $current_data, 'total'=>$dis]);
   	}

   	public function update(Request $req, $id)
   	{
        $this->validate($req, [
            'parent_id' => 'required|min:0|integer',
            'name' => 'required|string'
        ]);
        $dis_obj = Disease::find($id);
        if($req->parent_id == $dis_obj->id)  return ['code'=>'1', 'msg'=>'更新失败，请稍后重试', 'time'=>getNow()];
        if($dis_obj->update($req->all())) return ['code'=>'-4', 'msg'=>route('disease.index'), 'time'=>getNow()];
        return ['code'=>'1', 'msg'=>'更新失败，请稍后重试', 'time'=>getNow()];
   	}


}
