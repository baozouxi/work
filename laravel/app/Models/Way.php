<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Way extends Model
{
    public $timestamps = false;

    public $fillable = ['name', 'admin_id', 'is_use', 'sort'];
}
