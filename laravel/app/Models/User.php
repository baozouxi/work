<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    public $fillable = ['name', 'password', 'username', 'tel', 'weixin', 'qq', 'role_id'];
}
