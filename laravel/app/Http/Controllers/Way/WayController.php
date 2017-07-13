<?php

namespace App\Http\Controllers\Way;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Way;

class WayController extends Controller
{
    
	public function index()
	{
		$ways = Way::all();
		return view('way.index', ['ways'=>$ways]);
	}

	public function create()
	{
		return view('way.create');
	}	

	public function store(Request $req)
	{
		$this->validate($req, [
			'name' => 'string|required|min:2'
			]);
		$data['name'] = $req->name;
		$data['admin_id'] = '1';
		if (Way::create($data)) return code('添加成功', '-4');
		return code('添加失败，请刷新重试', '1');
	}

	public function edit()
	{

	}

	public function update()
	{

	}
}
