<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    public function index(Request $req)
    {
    	$this->validate($req, [
    		'username' => 'required|string|min:5',
    		'password' => 'required|string|min:5',
    		'code' => 'nullable|numeric',
    		]);
    	$data = $req->all();

    	$error = ['code'=>'1', 'msg'=>'用户名，密码错误', 'time'=>getNow()];

    	if(!$user = User::where('username', $data['username'])->first()) return  $error;

    	if($user->password !== sha1($data['password'])) return $error;

    	$role = Role::find($user->role_id)->toArray();

    	$acc_nodes = unserialize($role['nodes']);	

    	$req->session()->put('user_id', $user->id);

        $req->session()->put('role_id', $user->role_id);
    	
    	$req->session()->put('name', $user->name);

    	$req->session()->put('access_nodes', $acc_nodes);





    	return ['code'=>'0', 'msg'=>route('index'), 'time'=>getNow()];
    }	


}
