<?php

namespace App\Http\Controllers\RBAC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NodeGroup;

class NodeGroupController extends Controller
{
    
	public function create()
	{
		return view('Rbac.NodeGroup.create');
	}

	public function store(Request $req)
	{
		$this->validate($req, [
			'name' => 'string|required'
			]);
		$data = $req->all();
		$data['admin_id'] = '1';
		if (NodeGroup::create($data)) {
			return code(route('node.index'), '-4');
		}
		
		return code('添加失败，请重试', '1');

	}

}
