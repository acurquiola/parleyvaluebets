<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
	protected $guarded = [];
	
    public function markets()
    {
        return $this->belongsTo('App\Market');
    }
}
