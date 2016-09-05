<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DeportesController extends Controller
{
    //Listado de Juegos
    public function getLogros(){
		$name    = '%';
		$symbol  = '=';
		$marketsML = getMarkets('- Money Line', $symbol);
		$marketsTR = getMarkets('- Total Runs', $symbol);
		$markets = $marketsML->merge($marketsTR);
		$nombre  = 'Apuestas';

		foreach ($markets as $index => $market) {
			$logros[$index]  = ['deporte'            => '',
								'liga'               => '',
								'fecha'              => '',
								'hora'               => '',
								'equipo1'            => '',
								'equipo2'            => '',
								'moneyLine1'         => 0,
								'moneyLine2'         => 0,
								'handicap1'          => 0,
								'handicap2'          => 0,
								'handicapCuota1'     => 0,
								'handicapCuota2'     => 0,
								'totalCarreras'      => 0,
								'totalCarrerasCuotaO' => 0,
								'totalCarrerasCuotaU' => 0,
								'nombre'             => ''
							   ];

			$juego = preg_split( "/ (@|-|v|vs) /", $market->name);

			$logros[$index]['deporte'] = $market->types->clases->name;
			$logros[$index]['liga']    = $market->types->name;
			$logros[$index]['fecha']   = $market->betTillDate;
			$logros[$index]['hora']    = $market->betTillTime;
			$logros[$index]['equipo1'] = $juego[0];
			$logros[$index]['equipo2'] = $juego[1];
			$logros[$index]['nombre']  =  $market->name;

			if($juego[2] == 'Money Line'){
				foreach ($market->participants as $participant) {
					if($logros[$index]['equipo1'] == $participant->name){
						$logros[$index]['moneyLine1'] = $participant->oddsDecimal;
					}elseif($logros[$index]['equipo2'] == $participant->name){
						$logros[$index]['moneyLine2'] = $participant->oddsDecimal;
					}
				}
			}

			if($juego[2] == 'Total Runs'){
				foreach ($market->participants as $participant) {
					if($logros[$index]['equipo1'] == $juego[0]){
						$logros[$index]['totalCarreras'] = $participant->handicap;
					}elseif($logros[$index]['equipo2'] == $juego[1]){
						$logros[$index]['totalCarreras'] = $participant->handicap;
					}
					if($participant->name == 'Under'){
						$logros[$index]['totalCarrerasCuotaU'] = $participant->oddsDecimal;
					}elseif($participant->name == 'Over'){
						$logros[$index]['totalCarrerasCuotaO'] = $participant->oddsDecimal;
					}
				}
			}

		}		

    	return view('home.index', compact('markets', 'logros'));
    }

    public function getMoreMarkets($market){
		$nombre    = 'Más Apuestas';
		$symbol    = '>';
		$marketExp = explode('-', $market);
		$markets   = getMarkets($marketExp[0], $symbol);
		
    	return view('home.moreMarkets', compact('markets', 'nombre', 'market'));
    }
}
