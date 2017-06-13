<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dialog extends Model
{
    public $timestamps = false;

    public $fillable = ['weixin', 'zhuaqu', 'pcswt', 'sjswt','pcswt', 'web_tel', 'admin_id', 'content', 'date'];
}
