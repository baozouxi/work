<?php

namespace App\Http\Controllers\AD;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ad;

class AdController extends Controller
{
    
    public function index()
    {
        $ads = Ad::all();
    	return view('Ad.index', ['ads'=>$ads]);
    
    }

    public function create()
    {
    	return view('Ad.create');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|string|min:0'
            ]);
        $data['name'] =  $req->name;
        $data['admin_id'] = '1';
        if(Ad::create($data)) return code(route('ad.index'), '-4');

        return code('添加失败，请刷新重试', '1');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

}
