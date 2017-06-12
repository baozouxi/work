<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientTrack extends Model
{
    public $timestamps = false;

    public $fillable = ['patient_id', 'next_time', 'admin_id', 'content'];
}
