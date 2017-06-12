<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chatlog extends Model
{
	
    public $primaryKey  = 'id';

    public $timestamps = false;

    public $fillable = ['book_id', 'log'];
}
