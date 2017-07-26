<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RankRecord extends Model
{
    public $timestamps = false;

    public $table = 'rank_records';

    public $fillable = ['admin_id', 'click', 'cost', 'show_times', 'rank_way', 'rank_date', 'content'];
}
