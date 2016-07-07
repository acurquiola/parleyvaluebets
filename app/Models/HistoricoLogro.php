<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoLogro extends Model
{
	protected $guarded = [];
	
    public function participant()
    {
        return $this->belongsTo('App\Models\Participant');
    }
}
