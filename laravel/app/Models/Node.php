<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    
    public $timestamps = false;

    public $fillable = ['admin_id', 'name', 'nickname', 'group_id'];

    public $table = 'access_nodes';
}
