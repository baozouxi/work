<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    public $timestamps = false;

    public $fillable = ['name','age','gender','phone','dis','dep','ads','province','city','town','medical_num','content','admin_id','book_id'];
}
