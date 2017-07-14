<?php

namespace App\Http\Controllers\RBAC;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

/**
 * 用户控制器
 */
class UserController extends Controller
{
    
    public function index()
    {
        $user = User::all();
        $role = Role::all(['name','id'])->toArray();
        $role = array_column($role, 'name', 'id');
    	return view('Rbac.User.index', ['user'=>$user, 'role'=>$role]);
    }


    public function create()
    {
        $role = Role::all();
    	return view('Rbac.User.create', ['role'=>$role]);
    }

    public function edit($id)
    {
        $error = code('非法操作', '1');
        if($id != session('user_id')) return $error;
        if(!$user = User::find($id)) return $error;
        return view('Rbac.User.edit',['user'=>$user]);
    }

    public function update(Request $req, $id)
    {
        $this->validate($req, [
            'username' => 'string|required|min:5',
            'password' => 'string|required|min:5',
            'weixin' => 'nullable|string',
            'qq' =>  'nullable|numeric',
            'tel' => 'required|numeric',
            'oldpass' => 'required|string',
            'password' => 'required|string',
            ]);
        if($id != session('user_id')) return code('非法操作', '1');
        if(!$user = User::find($id)) return code('非法操作', '1');
        if($user->password != sha1($req->oldpass)) return code('原密码错误','1');
        $user->username = $req->username;
        $user->tel = $req->tel;
        $user->qq = $req->qq;
        $user->weixin =  $req->weixin;
        $user->password = sha1($req->password);
        if($user->save())  return ['code'=>'-3', 'field'=>'/logout', 'msg'=>'修改成功，请重新登录'];
        return code('修改失败', '1');
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
