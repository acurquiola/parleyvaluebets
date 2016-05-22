<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
	protected $guarded = [];
	
    public function Participant()
    {
        return $this->hasMany('App\Participant');
    }
    
    public function types()
    {
        return $this->belongsTo('App\Type');
    }
}
