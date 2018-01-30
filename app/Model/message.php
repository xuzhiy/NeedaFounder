<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    //
	protected $table = 'message';
	
	protected $guarded = [];
	
	public $timestamps = false;
}
