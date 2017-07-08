<?php

namespace App\Http\Controllers\RBAC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NodeGroup;
use App\Models\Node;

/**
 * 权限节点控制器
 */
class NodeController extends Controller
{
    public function index()
    {
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

        if(isset($data_reduce['未分组']))  $data_reduce['未分组']['id'] = '0';
      
    	return view('Rbac.Node.index', ['data'=>$data_reduce]);
    }

    public function create()
    {
        $group = NodeGroup::all();
    	return view('Rbac.Node.create', ['group' => $group]);
    }

    public function store(Request $req)
    {
    	$this->validate($req, [
            'name' => ['required','regex:/[a-zA-Z\d\-_]+/'],
            'nickname' =>['required','regex:/^[\x7f-\xff]+$/'],
            'group_id' => 'integer|required|min:0']);
        $data = $req->all();
        $data['admin_id'] = '1';
        if (Node::create($data)) {
            return code(route('node.index'), '-4');
        }
        return code('添加失败,请重试', '1');
    }



}
