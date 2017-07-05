<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index()
    {
    	return view('Nav.index');
    }

    public function create()
    {
    	return view('Nav.create');
    }

    public function store(Request $req)
    {
    	
    }
    
}
