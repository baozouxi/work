<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    public $timestamps = false;

    public $fillable = ['name', 'track_time', 'province', 'city', 'town', 'age', 'gender', 'phone', 'filepath', 'content', 'dis', 'way', 'admin_id'];
}
