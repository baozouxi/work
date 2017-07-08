<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleWithNav extends Model
{
    public $timestamps = false;

    public $fillable = ['admin_id', 'role_id', 'nodes'];

  	public $table = 'role_with_nav';
}