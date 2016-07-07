<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $guarded = [];
	
    public function markets()
    {
        return $this->hasMany('App\Models\Market');
    }

}
