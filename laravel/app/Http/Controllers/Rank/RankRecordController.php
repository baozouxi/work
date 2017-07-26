<?php

namespace App\Http\Controllers\Rank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RankRecordRequest;
use App\Models\RankRecord;
use App\Models\Rank;

class RankRecordController extends Controller
{
    public function index()
    {
        $ranks = Rank::all()->toArray();
        $ranks = array_column($ranks, 'name', 'id');
        $users = getAuxiliary()['users'];
        $records = RankRecord::all();
        foreach($records as $record){
            $record->rank_way = isset($ranks[$record->rank_way]) ? $ranks[$record->rank_way] : '未知';
            $record->admin_id = isset($users[$record->admin_id]) ? $users[$record->admin_id] : '未知';
        }
        return view('Rank.Record.index', ['records'=>$records]);
    }

    public function create()
    {
        $ranks = Rank::all();
        return view('Rank.Record.create', ['ranks'=>$ranks]);
    }

    public function store(RankRecordRequest $req)
    {

        $data = $req->all();
        $data['admin_id'] = '1';
        if(RankRecord::create($data)) return code(route('rank-record.index'), '0');

        return code('添加失败，请刷新后重试', '1');

    }

    public function edit($id)
    {
        $ranks = Rank::all();
        $record = RankRecord::findOrFail($id);
        return view('Rank.Record.edit', ['record'=>$record, 'ranks'=>$ranks]);
    }

    public function update(RankRecordRequest $req, $id)
    {
        $record = RankRecord::findOrFail($id);
        $record->click = $req->click;
        $record->rank_way = $req->rank_way;
        $record->cost = $req->cost;
        $record->show_times = $req->show_times;
        $record->rank_date = $req->rank_date;
        $record->content = $req->content;
        if ($record->save()) return code(route('rank-record.index'), '0');
        return code('修改失败，请刷新重试', '1');
    }

    public function show($id)
    {

    }
}
