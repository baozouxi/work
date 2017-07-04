<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    public $fillable = ['admin_id', 'nodes', 'name', 'type'];
}
