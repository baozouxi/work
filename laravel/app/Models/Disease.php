<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    public $timestamps = false;

    public $fillable = ['parent_id', 'name', 'admin_id', 'sort', 'is_use'];
}
