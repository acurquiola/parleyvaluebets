<?php

function getMarkets($name, $symbol)
	{
	$today           = Carbon\Carbon::now();
	$today->timezone = 'Europe/Madrid';
	$MLB             = \App\Models\Type::where('name', 'MLB')->first()->id;
	$markets = \App\Models\Market::with(['participants' => function($query){
										$query->orderBy('participants.oddsDecimal', 'ASC');
							}])->where(function ($query) use ($today, $symbol, $name, $MLB){
						  $query->where('markets.betTillDate', $symbol, $today->toDateString())
								->where('markets.name', 'like', '%'.$name.'%')
								->where('markets.type_id', $MLB);
						  })->orWhere(function($query) use ($today, $symbol, $name, $MLB){
								$query->where('markets.betTillDate', '=', $today->toDateString())
								->where('markets.name', 'like', '%'.$name.'%')
								->where('markets.betTillTime', '>', $today->toTimeString())
								->where('markets.type_id', $MLB);
							})->orderBy('markets.betTillDate', 'ASC')
							->orderBy('markets.betTillTime', 'ASC')
							->get();
	return $markets;
}

