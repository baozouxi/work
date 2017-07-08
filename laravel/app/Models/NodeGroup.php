<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NodeGroup extends Model
{
    
    public $timestamps = false;

    public $fillable = ['name', 'admin_id'];

    public $table = 'node_group';
}
