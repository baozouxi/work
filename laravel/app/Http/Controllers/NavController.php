<?php

namespace App\Http\Controllers;


use App\Models\Nav;
use App\Http\Requests\NavRequest;

class NavController extends Controller
{
    public function index()
    {
        $nav_arr = Nav::orderBy('sort', 'desc')->get()->toArray();
        $nav_reduce = [];

        foreach ($nav_arr as $key => $navItem) {
            if($navItem['parent_id'] == '0') {
                $navItem['nav_child'] = [];
                $nav_reduce[$navItem['id']] = $navItem;
                unset($nav_arr[$key]);
            }
        }

        foreach ($nav_arr as $key => $navNode) {
            if (isset($nav_reduce[$navNode['parent_id']])) {
                $nav_reduce[$navNode['parent_id']]['nav_child'][$navNode['id']] = $navNode;
                unset($nav_arr[$key]);
            }
        }
        

        return view('nav.index', ['nav'=> $nav_reduce]);
    }

    public function create()
    {
        $nav_top_arr = Nav::where('parent_id', '0')->get();
    	return view('Nav.create', ['nav_top_arr'=>$nav_top_arr]);
    }

    public function store(NavRequest $req)
    {
    	$data = $req->all();
        if(Nav::create($data))  return code(route('nav.index'), '-4');
        return code('添加失败，请重试', '1');
    }


    public function edit($id)
    {
        if(!$nav = Nav::find($id)) return code('非法操作，请刷新', '1');
        $topNav = Nav::whereNotIn('id',[$id])->get();
        return view('Nav.edit', ['nav'=>$nav,'nav_top_arr'=>$topNav]);
    }

    public function update(NavRequest $req, $id)
    {

        $data = $req->all();
        if(!$nav = Nav::find($id)) return code('非法操作，请刷新', '1');
        if ($data['parent_id'] != $nav->parent_id) {
            if(Nav::where('parent_id', $id)->get()->toArray()) return code('该栏目下有子栏目，不支持移动', '1');
        }
        $nav->name = $data['name'];
        $nav->url = $data['url'];
        $nav->icon = $data['icon'];
        $nav->parent_id = $data['parent_id'];
        if ($nav->save()) return code('修改成功', '-4');
        return code('修改失败，请刷新重试', '1');

    }

    public function sort($id, $sort='0')
    {
        if (!$nav = Nav::find($id)) return code('非法操作，请刷新', '1');
        $nav->sort = (int)$sort;
        if($nav->save()) return code('<i>'.(int)$sort.'<i>', '1');
        return code('修改失败', '-1');
    }
    
}
