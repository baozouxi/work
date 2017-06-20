<?php

namespace App\Http\Controllers\ReCall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReCallController extends Controller
{
    
    public function index()
    {
    	
    	return view('ReCall.index');
    }
}
