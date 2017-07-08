<?php

namespace App\Http\Controllers\RBAC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Nav;
use App\Models\NodeGroup;
use App\Models\Node;
use App\Models\RoleWithNav;
use DB;

/**
 * 角色控制器
 */
class RoleController extends Controller
{
    
    public function index()
    {
        $role  = Role::all();
    	return view('Rbac.Role.index', ['role'=>$role]);
    }

    public function create()
    {
        //导航
        $nav = Nav::all();
        //权限节点
        $group = NodeGroup::all()->toArray();
        $node = Node::all()->toArray();

        //以ID为键重组数组
        $group = array_column($group, 'name', 'id');
        $data_reduce = [];

        foreach ($node as $nodeItem) {
            if (isset($group[$nodeItem['group_id']])) {
                $data_reduce[$group[$nodeItem['group_id']]]['id'] = $nodeItem['group_id'];
                $data_reduce[$group[$nodeItem['group_id']]]['child'][] = $nodeItem; 
                continue;
            }

            $data_reduce['未分组']['child'][] = $nodeItem; 

        }

        if(isset($data['未分组'])) $data_reduce['未分组']['id'] = '0';
    	return view('Rbac.Role.create', ['nav'=>$nav, 'nodes'=>$data_reduce]);
    }

    public function store(Request $req)
    {
    	$this->validate($req, [
    		'name' => 'string|required',
    		'manage' => 'array|required',
            'nav' => 'array|required',
    		]);
        $data = $req->all();

        //节点数组序列化后存入表中
        $data['nodes'] = serialize($data['manage']);
        $data['admin_id'] = '1';
        unset($data['manage']);
        try{
            DB::beginTransaction();
            
            if(!$id = Role::create($data)->id)  throw new \Exception('角色创建失败');
            
            //角色权限关联
            if (!empty($data['nav'])) {
                $data['role_id'] = $id;
                $data['nodes'] = serialize($data['nav']); //此处操作是因为role_with_nav表 和 role表权限节点字段名称一样
                if(!RoleWithNav::create($data)) throw new \Exception('导航节点创建失败');
            }
            DB::commit();
            return code(route('role.index'));
        } catch(\Exception $e) {
            DB::rollback();
            return code($e->getMessage(),'1');
        }
        
            

    }

}
