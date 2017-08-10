<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    
    public static $type = ['insert', 'delete', 'update', 'login', 'logout', 'upload'];

    public static $info = [];

    public function log()
    {

    }

}
