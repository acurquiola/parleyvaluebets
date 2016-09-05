<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $guarded = [];
	
    public function markets()
    {
        return $this->hasMany('App\Models\Market', 'type_id', 'id');
    }
    
    public function clases()
    {
        return $this->belongsTo('App\Models\Clase', 'clase_id');
    }

}
