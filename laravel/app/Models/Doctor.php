<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    
    public $timestamps = false;

    public $fillable = ['admin_id', 'name', 'dis_id', 'is_use'];
}
