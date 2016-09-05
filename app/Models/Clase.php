<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
	protected $guarded = [];
	
    public function types()
    {
        return $this->hasMany('App\Models\Type', 'clase_id', 'id');
    }
}
