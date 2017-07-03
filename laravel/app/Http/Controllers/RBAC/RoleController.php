<?php

namespace App\Http\Controllers\RBAC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * 角色控制器
 */
class RoleController extends Controller
{
    

    public function index()
    {
    	return view('Rbac.Role.index');
    }

    public function create()
    {
    	return view('Rbac.Role.create');
    }

    public function store(Request $req)
    {
    	$this->validate($req, [
    		'name' => 'string',
    		'manage' => 'array',
    		]);
    }

}
