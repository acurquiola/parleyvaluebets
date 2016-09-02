<?php

function getMarkets($name)
{

    $today   = Carbon\Carbon::now();
	$markets = \App\Models\Market::with('participants')->where(function ($query) use ($today, $name){
						  $query->where('betTillDate', '>', $today->toDateString())
								->where('name', 'like', '%'.$name.'%');
						  })->orWhere(function($query) use ($today, $name){
								$query->where('betTillDate', '=', $today->toDateString())
								->where('name', 'like', '%'.$name.'%')
								->where('betTillTime', '>', $today->toTimeString());
							})->orderBy('betTillDate', 'ASC')
							->orderBy('betTillTime', 'ASC')
							->get();
	return $markets;

}