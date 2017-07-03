<?php

namespace App\Http\Controllers\RBAC;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;

/**
 * 用户控制器
 */
class UserController extends Controller
{
    
    public function index()
    {

    	return view('Rbac.User.index');
    }

    public function create()
    {
    	return view('Rbac.User.create');
    }

    public function store(UserRequest $req)
    {
        $data = $req->all();
        $data['password'] = sha1($data['password']);
        if(User::create($data)) {
            return ['code'=>'0', 'msg'=>route('user.index'), 'time'=>getNow()];
        }
        return ['code'=>'1', 'msg'=>'添加失败，请重试','time'=>getNow()];
    }

}
