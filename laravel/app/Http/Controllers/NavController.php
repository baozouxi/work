<?php

namespace App\Http\Controllers;


use App\Models\Nav;
use App\Http\Requests\NavRequest;

class NavController extends Controller
{
    public function index()
    {
        $nav_arr = Nav::all()->toArray();
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

    
}
