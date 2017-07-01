<?php

namespace App\Http\Controllers\RBAC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function store()
    {

    }
}
