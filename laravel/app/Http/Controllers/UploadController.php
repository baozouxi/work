<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{


    public function index()
    {

    }




    public function upload(Request $req)
    {
        if ($req->hasFile('files1')) {
            echo $req->file('files1')->getSize();
        }
    }

}
