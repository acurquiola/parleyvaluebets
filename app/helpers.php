<?php

function getMarkets($name){
	$today           = Carbon\Carbon::now();
	$today->timezone = 'Europe/Madrid';
	$MLB             = \App\Models\Type::where('name', 'MLB')->first()->id;
	if($MLB == null)
		$MLB = 0;
	$markets = \App\Models\Market::with(['participants' => function($query){
										$query->orderBy('participants.oddsDecimal', 'ASC');
							}])->where(function ($query) use ($today, $name, $MLB){
						  $query->where('markets.betTillDate', '>', $today->toDateString())
								->where('markets.name', 'like', '%'.$name.'%')
								->where('markets.type_id',  ($MLB == 0)?'>':'=', $MLB);
						  })->orWhere(function($query) use ($today,   $name, $MLB){
								$query->where('markets.betTillDate', '=', $today->toDateString())
								->where('markets.name', 'like', '%'.$name.'%')
								->where('markets.betTillTime', '>', $today->toTimeString())
								->where('markets.type_id', $MLB);
							})->orderBy('markets.betTillDate', 'ASC')
							->orderBy('markets.betTillTime', 'ASC')
							->get();
	return $markets;
}

function getCompetencias($type, $competicion){

	$today           = Carbon\Carbon::now();
	$today->timezone = 'Europe/Madrid';
	if($type != '%')
		$type = \App\Models\Type::where('name', $type)->first()->id;
	$markets = \App\Models\Market::with(['participants' => function($query){
										$query->orderBy('participants.oddsDecimal', 'ASC');
							}])->where(function ($query) use ($today, $competicion, $type){
						  $query->where('markets.betTillDate', '>', $today->toDateString())
								->where('markets.name', 'like', '%'.$competicion.'%')
								->where('markets.type_id',  ($type == 0)?'>':'=', $type);
						  })->orWhere(function($query) use ($today,   $competicion, $type){
								$query->where('markets.betTillDate', '=', $today->toDateString())
								->where('markets.name', 'like', '%'.$competicion.'%')
								->where('markets.betTillTime', '>', $today->toTimeString())
								->where('markets.type_id', $type);
							})->orderBy('markets.betTillDate', 'ASC')
							->orderBy('markets.betTillTime', 'ASC')
							->get();
	return $markets;
}

function getTipoUsuario($username){
	$tipoUsuario = \App\Models\User::where('username', session('username'))->first()->tipoUsuario;
	return $tipoUsuario;
}

function getToday(){
	$today           = Carbon\Carbon::now();
	$today->timezone = 'Europe/Madrid';

	return $today;
}