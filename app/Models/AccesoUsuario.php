<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccesoUsuario extends Model
{

	protected $guarded = [];
	
    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
