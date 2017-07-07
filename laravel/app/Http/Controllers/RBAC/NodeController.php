<?php

namespace App\Http\Controllers\RBAC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * 权限节点控制器
 */
class NodeController extends Controller
{
    public function index()
    {
    	return view('Rbac.Node.index');
    }
}
