<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public $timestamps = false;

    public $fillable = ['name', 'admin_id'];
}
