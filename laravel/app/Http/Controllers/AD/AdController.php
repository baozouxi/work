<?php

namespace App\Http\Controllers\AD;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    
    public function index()
    {
    	return view('Ad.index');
    }

    public function create()
    {
    	return view('Ad.create');
    }

    public function store(Request $req)
    {
        
    }

    public function edit()
    {

    }

    public function update()
    {

    }

}
