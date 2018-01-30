<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    //
	protected $table = 'payment';
	
	protected $guarded = [];
	
	public $timestamps = false;
}
