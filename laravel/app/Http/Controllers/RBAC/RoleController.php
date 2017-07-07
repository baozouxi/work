<?php

namespace App\Http\Controllers\RBAC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Nav;

/**
 * 角色控制器
 */
class RoleController extends Controller
{
    

    public function index()
    {
    	return view('Rbac.Role.index');
    }

    public function create()
    {
        $nav = Nav::all();
    	return view('Rbac.Role.create', ['nav'=>$nav]);
    }

    public function store(Request $req)
    {
    	$this->validate($req, [
    		'name' => 'string|required',
    		'manage' => 'array|required',
    		]);
        $data = $req->all();
        //节点数组序列化后存入表中
        $data['nodes'] = serialize($data['manage']);
        $data['type'] = $data['role'];
        $data['admin_id'] = '1';
        unset($data['manage']);
        if (Role::create($data)) {
            return ['code'=>'0', 'msg'=>route('role.index'), 'time'=>getNow()];
        }
        return ['code'=>'1', 'msg'=>'添加失败，请稍后重试', 'time'=>getNow()];

    }

}
