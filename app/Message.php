<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

	public $incrementing = false;
	
    protected $fillable = [
        'id', 'from', 'to',
    ];


}
