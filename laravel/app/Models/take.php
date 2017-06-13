<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class take extends Model
{
    public $timestamps = false;

    public $fillable = ['dose', 'admin_id', 'doctor', 'check_cost', 'hospitalization_cost', 'drug_cost', 'treatment_cost', 'patient_id','content'];
}
