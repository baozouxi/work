<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    public $timestamps = false;

    public $fillable  = ['name', 'url', 'parent_id', 'sort', 'is_use', 'icon'];
}
