<?php

namespace App\Http\Controllers\Disease;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * 病种控制器
 */
class DisController extends Controller
{
   	
   	public function index()
   	{
   		return view('Dis.index');
   	}   
   	
   	public function create()
   	{
   		return view('Dis.create');
   	}

   	public function store(Request $req)
   	{

   	}

   	public function show()
   	{

   	}

   	public function edit()
   	{

   	}

   	public function update()
   	{

   	}


}
