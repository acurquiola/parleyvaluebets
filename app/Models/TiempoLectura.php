<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiempoLectura extends Model
{
	protected $guarded = [];
	
    public function deportes()
    {
        return $this->belongsTo('App\Models\Clase', 'clase_id');
    }
}
