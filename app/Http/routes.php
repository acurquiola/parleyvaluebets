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

//Authentication Routes
Route::group(['prefix' => 'auth/'], function () {
	//Iniciar Sesión
	Route::get('login',  ['as'   => 'login', 
							'uses' => 'Auth\AuthController@getLogin']);

	Route::post('login',  'Auth\AuthController@postLogin');

	//Cerrar Sesión 
	Route::get('logout',   ['as'   => 'logout', 
							'uses' => 'Auth\AuthController@getLogout']);

	Route::group(['middleware' => 'routeConfirm'], function(){
		//Establecer contraseñas
		Route::get('confirm/{email}/token/{token}', [ 'as'   => 'getPassword',
													  'uses' => 'UserController@getPassword']);
	});
		
	Route::post('password',  ['as'  => 'postPassword', 
							 'uses' => 'UserController@postPassword' ]);
});



//Password Reset Routes
Route::group(['prefix' => 'password/'], function(){
	Route::get('email', 'Auth\PasswordController@getEmail');
	Route::post('email', 'Auth\PasswordController@postEmail');
	Route::get('reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('reset', 'Auth\PasswordController@postReset');
});


Route::group(['middleware' => 'auth'], function() {

	Route::get('/', ['as' => 'home',
					 'uses' =>  'DeportesController@index']);

	Route::group(['prefix' => 'deportes/'], function () {
		//Beisbol
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
		Route::resource('beisbol', 'BeisbolController', ['only' => ['index']]);

		//Fútbol Americano
		Route::get('futbolAmericano/{type}/{competicion}', 'FutbolAmericanoController@getCompetencias');
		Route::get('futbolAmericano/{type}/{competicion}/masApuestas', 'FutbolAmericanoController@getMasCompetencias');
		Route::resource('futbolAmericano', 'FutbolAmericanoController', ['only' => ['index']]);

		//Hockey
		Route::get('hockey/{type}/{competicion}', 'HockeyController@getCompetencias');
		Route::get('hockey/{type}/{competicion}/masApuestas', 'HockeyController@getMasCompetencias');
		Route::resource('hockey', 'HockeyController', ['only' => ['index']]);

		//Baloncesto
		Route::get('baloncesto/{type}/{competicion}', 'BaloncestoController@getCompetencias');
		Route::get('baloncesto/{type}/{competicion}/masApuestas', 'BaloncestoController@getMasCompetencias');
		Route::resource('baloncesto', 'BaloncestoController', ['only' => ['index']]);

		//Todos los deportes
		Route::get('todos/{type}/{competicion}/masApuestas', 'DeportesController@getMasCompetencias');
		Route::resource('todos', 'DeportesController');
	});
	
	Route::group(['prefix' => 'Values/'], function () {
	    Route::get('leerXML', 'XmlReaderController@getXml');
		Route::resource('xml', 'XmlReaderController', ['only' => ['index']]);
	});


	Route::group(['middleware' => 'role:admin'], function(){

		Route::group(['prefix' => 'admin'], function () {
			Route::get('configuracion', 'AdministradorController@getConfiguracion');
			Route::post('configuracion', 'AdministradorController@postConfiguracion');
			Route::resource('/', 'AdministradorController', ['only' => ['index']]);
			Route::get('usuarios/confirmacion/{user}', 'UserController@sendConfirmation');
			Route::resource('/usuarios', 'UserController');
			Route::resource('/historialAcceso', 'AccesoUsuarioController');
		});
	});


});
