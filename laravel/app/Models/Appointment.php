<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    //
    public $timestamps = false;

    public $primaryKey = 'id';

    public $fillable = ['name','age','gender','phone','dis','way','postdate','filepath','province','city','town','address','content','job','qq','weixin','keyword','website','source','admin_id','res','undate'];
}
