<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    public $timestamps = false;

    public $fillable = ['content', 'admin_id', 'phone'];
}
