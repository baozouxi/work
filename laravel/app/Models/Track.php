<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
	public $timestamps = false;

    public $fillable = ['next_time', 'book_id', 'content', 'admin_id'];
}
