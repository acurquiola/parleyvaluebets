<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('auth/login',  'Auth\AuthController@getLogin');
Route::post('auth/login',  'Auth\AuthController@postLogin');
Route::get('auth/logout',  'Auth\AuthController@getLogout');


Route::get('/', 'DeportesController@index');

Route::group(['prefix' => 'deportes/'], function () {
	Route::get('beisbol/primerJugadorEnConseguirHR', 'BeisbolController@getFirstPlayerHitHR');
	Route::get('beisbol/jugadorEnConseguirHR', 'BeisbolController@getPlayerHitHR');
	Route::get('beisbol/{market}/masApuestas', 'BeisbolController@getMoreMarkets');
	Route::get('beisbol/totalCarreras', 'BeisbolController@getTotalRuns');
	Route::get('beisbol/ganadorPartido', 'BeisbolController@getMoneyLine');
	Route::get('beisbol/ligaGanadora', 'BeisbolController@getWinningLeague');
	Route::get('beisbol/apuestasEnPrimerInning', 'BeisbolController@getFirstInningBetting');
	Route::get('beisbol/totalCarrerasEnPrimerInning', 'BeisbolController@getFirstInningTotalRun');
	Route::get('beisbol/divisionGanadora', 'BeisbolController@getWinningDivision');
	Route::get('beisbol/ganadorLigaNacional', 'BeisbolController@getNationalLeagueWinner');
	Route::get('beisbol/ganadorLigaAmericana', 'BeisbolController@getAmericanLeagueWinner');
	Route::get('beisbol/ganadorSerieMundial', 'BeisbolController@getWorldSerieWinner');
	Route::get('beisbol/ganadorDivision', 'BeisbolController@getDivisionWinner');
	Route::resource('beisbol', 'BeisbolController');
	Route::get('todos/{market}/masApuestas', 'DeportesController@getMoreMarkets');
	Route::resource('todos', 'DeportesController');
});


Route::group(['prefix' => 'Values/'], function () {
    Route::get('leerXML', 'XmlReaderController@getXml');
	Route::resource('xml', 'XmlReaderController');
});

