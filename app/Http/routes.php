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


Route::get('/',  'Auth\AuthController@getLogin');


Route::group(['prefix' => 'Values/'], function () {
    Route::get('leerXML', 'XmlReaderController@getXml');
	Route::resource('xml', 'XmlReaderController');
});
Route::group(['prefix' => 'deportes/'], function () {
Route::get('beisbol/totalCarrerasEnPrimerInning', 'BeisbolController@getFirstInningTotalRun');
Route::get('beisbol/divisionGanadora', 'BeisbolController@getWinningDivision');
Route::get('beisbol/ganadorLigaNacional', 'BeisbolController@getNationalLeagueWinner');
Route::get('beisbol/ganadorLigaAmericana', 'BeisbolController@getAmericanLeagueWinner');
Route::get('beisbol/ganadorSerieMundial', 'BeisbolController@getWorldSerieWinner');
Route::get('beisbol/ganadorDivision', 'BeisbolController@getDivisionWinner');
Route::resource('beisbol', 'BeisbolController');
});


