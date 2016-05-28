<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoLogro extends Model
{
	protected $guarded = [];
	
    public function markets()
    {
        return $this->belongsTo('App\Models\Market');
    }
}
