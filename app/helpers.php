<?php

function getMarkets($name, $symbol)
{
    $today   = Carbon\Carbon::now();
	$markets = \App\Models\Market::with('participants')->where(function ($query) use ($today, $symbol, $name){
						  $query->where('markets.betTillDate', $symbol, $today->toDateString())
								->where('markets.name', 'like', '%'.$name.'%');
						  })->orWhere(function($query) use ($today, $symbol, $name){
								$query->where('markets.betTillDate', '=', $today->toDateString())
								->where('markets.name', 'like', '%'.$name.'%')
								->where('markets.betTillTime', '>', $today->toTimeString());
							})->orderBy('markets.betTillDate', 'ASC')
							->orderBy('markets.betTillTime', 'ASC')
							->get();
	return $markets;
}

