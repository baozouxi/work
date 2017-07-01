<?php

namespace App\Http\Controllers\Way;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WayController extends Controller
{
    
	public function index()
	{
		return view('way.index');
	}

	public function create()
	{
		return view('way.create');
	}	

	public function store()
	{

	}

	public function edit()
	{

	}

	public function update()
	{

	}
}
