<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DeportesController extends Controller
{
    //Listado de Juegos
	public function getLogros(){
		$symbol    = '>';
		$logros    = [];
		$marketsML = getMarkets('- Money Line');
		$marketsTR = getMarkets('- Total Runs');
		$nombre    = 'Apuestas';

		foreach ($marketsML as $index => $mL) {

			$logros[$index]  = ['deporte'             => '',
								'liga'                => '',
								'fecha'               => '',
								'hora'                => '',
								'equipo1'             => '',
								'equipo2'             => '',
								'moneyLine1'          => 0,
								'moneyLine2'          => 0,
								'handicap1'           => 0,
								'handicap2'           => 0,
								'handicapCuota1'      => 0,
								'handicapCuota2'      => 0,
								'totalCarreras'       => 0,
								'totalCarrerasCuotaO' => 0,
								'totalCarrerasCuotaU' => 0,
								'nombre'              => ''
								];
			foreach ($marketsTR as $index => $tR) {

				$juegoTr = preg_split( "/ (@|-|v|vs) /", $tR->name);
				$juegoMl = preg_split( "/ (@|-|v|vs) /", $mL->name);


				if($juegoTr[0] == $juegoMl[0] && $juegoTr[1] == $juegoMl[1]){

					$logros[$index]['deporte'] = $mL->types->clases->name;
					$logros[$index]['liga']    = $mL->types->name;
					$logros[$index]['fecha']   = $mL->betTillDate;
					$logros[$index]['hora']    = $mL->betTillTime;
					$logros[$index]['equipo1'] = $juegoMl[0];
					$logros[$index]['equipo2'] = $juegoMl[1];
					$logros[$index]['nombre']  = $mL->name;


					foreach ($mL->participants as $participantML) {
						if($participantML->isChange == 0){
							if($logros[$index]['equipo1'] == $participantML->name){
								$logros[$index]['moneyLine1'] = $participantML->oddsDecimal;
							}elseif($logros[$index]['equipo2'] == $participantML->name){
								$logros[$index]['moneyLine2'] = $participantML->oddsDecimal;
							}
						}else{
							$participantHistML = \App\Models\HistoricoLogro::where('participant_id', $participantML->id)->orderBy('id', 'DESC')->first();
							if($logros[$index]['equipo1'] == $participantHistML->name){
								$logros[$index]['moneyLine1'] = $participantHistML->oddsDecimal;
							}elseif($logros[$index]['equipo2'] == $participantHistML->name){
								$logros[$index]['moneyLine2'] = $participantHistML->oddsDecimal;
							}

						}
					}

					foreach ($tR->participants as $participantTR) {
						if($participantTR->isChange == 0){
							if($logros[$index]['equipo1'] == $juegoTr[0]){
								$logros[$index]['totalCarreras'] = $participantTR->handicap;
							}elseif($logros[$index]['equipo2'] == $juegoTr[1]){
								$logros[$index]['totalCarreras'] = $participantTR->handicap;
							}
	
							if($participantTR->name == 'Under'){
								$logros[$index]['totalCarrerasCuotaU'] = $participantTR->oddsDecimal;
							}elseif($participantTR->name == 'Over'){
								$logros[$index]['totalCarrerasCuotaO'] = $participantTR->oddsDecimal;
							}
						}else{
							$participantHistTR = \App\Models\HistoricoLogro::where('participant_id', $participantTR->id)->orderBy('id', 'DESC')->first();
							if($logros[$index]['equipo1'] == $juegoTr[0]){
								$logros[$index]['totalCarreras'] = $participantHistTR->handicap;
							}elseif($logros[$index]['equipo2'] == $juegoTr[1]){
								$logros[$index]['totalCarreras'] = $participantHistTR->handicap;
							}
	
							if($participantHistTR->name == 'Under'){
								$logros[$index]['totalCarrerasCuotaU'] = $participantHistTR->oddsDecimal;
							}elseif($participantHistTR->name == 'Over'){
								$logros[$index]['totalCarrerasCuotaO'] = $participantHistTR->oddsDecimal;
							}

						}
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
