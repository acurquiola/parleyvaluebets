<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
	protected $guarded = [];
	
    public function participants()
    {
        return $this->hasMany('App\Models\Participant');
    }
    
    public function types()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }
    
}
