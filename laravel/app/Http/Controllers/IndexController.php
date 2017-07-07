<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nav;

class IndexController extends Controller
{
    
   	public function index(Request $req)
   	{		

   		$nav_arr = Nav::all()->toArray();
   		$nav_reduce = [];
   		$nav_reduce = array_column($nav_arr, null, 'id');
       
        foreach ($nav_reduce as $key => $navItem) {
            if( ($navItem['parent_id'] != '0') && (isset($nav_reduce[$navItem['parent_id']])) ) {
                $nav_reduce[$navItem['parent_id']]['nav_child'][] = $navItem;
                unset($nav_reduce[$key]);
            }
        }
        
   		return view('index');
   	}

 }

