<?php

namespace App\Http\Controllers\Rank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rank;

class RankController extends Controller
{
    public function index()
    {
        $ranks = Rank::all();
        return view('Rank.index', ['ranks'=>$ranks]);
    }

    public function create()
    {
        return view('Rank.create');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|string|min:5'
            ]);

        $rank = new Rank();
        $rank->name = $req->name;
        $rank->admin_id = '1';
        if ($rank->save()) return code('添加成功', '-4');

        return code('添加失败，请刷新重试', '1');
    }

    

}
