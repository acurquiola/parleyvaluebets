<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Market;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeportesController extends Controller
{


    //Listado de Juegos
	public function index(){
		$nombre          = 'Apuestas';
		$today           = getToday();
		$logros          = [];
		$deporte = [
					'beisbol'         => 0,
					'hockey'          => 0,
					'futbolAmericano' => 0
					];
		$types  = Type::where('name', 'NFL')
									->orWhere('name', 'MLB')
									->orWhere('name', 'NHL')
									->lists('id')
									->toArray();


		$partidos = DB::table('markets')
					  ->where(function ($query) use ($today, $types){
								  $query->where('markets.betTillDate', '>', $today->toDateString())
								  		->whereIn('markets.type_id', $types)
								  		->where(function($query){
								  			$query->where('markets.name', 'LIKE', '%- Total Runs')
								  				  ->orWhere('markets.name', 'LIKE', '%- Total Points')
								  				  ->orWhere('markets.name', 'LIKE', '%- Total Match Goals')
								  				  ->orWhere('markets.name', 'LIKE', '%- Spread')
								  				  ->orWhere('markets.name', 'LIKE', '%- Puck Line Handicap')
								  				  ->orWhere('markets.name', 'LIKE', '%- Money Line');
								  		});
								  })->orWhere(function($query) use ($today, $types){
										$query->where('markets.betTillDate', '=', $today->toDateString())
								  		->whereIn('markets.type_id', $types)
										->where('markets.betTillTime', '>', $today->toTimeString())
								  		->where(function($query){
								  			$query->where('markets.name', 'LIKE', '%- Total Runs')
								  				  ->orWhere('markets.name', 'LIKE', '%- Total Points')
								  				  ->orWhere('markets.name', 'LIKE', '%- Total Match Goals')
								  				  ->orWhere('markets.name', 'LIKE', '%- Spread')
								  				  ->orWhere('markets.name', 'LIKE', '%- Puck Line Handicap')
								  				  ->orWhere('markets.name', 'LIKE', '%- Money Line');
								  		});
									})->orderBy('markets.betTillDate', 'ASC')
									->orderBy('markets.betTillTime', 'ASC')
									->get();






		foreach ($partidos as $id => $partido) {
			$p   = explode('-', $partido->name);


			$markets = Market::with(['participants' => function($query){
										$query->orderBy('participants.oddsDecimal', 'ASC');
								}])->where(function ($query) use ($today, $types, $p){
							  $query->where('markets.betTillDate', '>', $today->toDateString())
							  		->whereIn('markets.type_id', $types)
							  		->where('markets.name', 'like', $p[0].'%')
							  		->where(function($query){
							  			$query->where('markets.name', 'LIKE', '%- Total Runs')
							  				  ->orWhere('markets.name', 'LIKE', '%- Total Points')
							  				  ->orWhere('markets.name', 'LIKE', '%- Spread')
							  				  ->orWhere('markets.name', 'LIKE', '%- Money Line');
							  		});
							  })->orWhere(function($query) use ($today, $types, $p){
									$query->where('markets.betTillDate', '=', $today->toDateString())
							  		->whereIn('markets.type_id', $types)
									->where('markets.betTillTime', '>', $today->toTimeString())
							  		->where('markets.name', 'like', $p[0].'%')
							  		->where(function($query){
							  			$query->where('markets.name', 'LIKE', '%- Total Runs')
							  				  ->orWhere('markets.name', 'LIKE', '%- Total Points')
							  				  ->orWhere('markets.name', 'LIKE', '%- Spread')
							  				  ->orWhere('markets.name', 'LIKE', '%- Money Line');
							  		});
								})->orderBy('markets.betTillDate', 'ASC')
								->orderBy('markets.betTillTime', 'ASC')
								->get();

			$name = trim($p[0]);


			$logros[$name]=['deporte'           => '',
							'liga'              => '',
							'fecha'             => '',
							'hora'              => '',
							'equipo1'           => '',
							'equipo2'           => '',
							'moneyLine1'        => 0,
							'moneyLine2'        => 0,
							'totalHandicap1'    => 0,
							'totalHandicap2'    => 0,
							'handicapCuota1'    => 0,
							'handicapCuota2'    => 0,
							'totalPuntos'       => 0,
							'totalPuntosCuotaO' => 0,
							'totalPuntosCuotaU' => 0,
							];

			foreach ($markets as $market) {

			$juego = preg_split( "/ (@|-|v|vs) /", $market->name);
			$type = Type::find($market->type_id);

			$logros[$name]['deporte'] = $type->clases->name;
			$logros[$name]['liga']    = $type->name;
			$logros[$name]['fecha']   = $partido->betTillDate;
			$logros[$name]['hora']    = $partido->betTillTime;
			$logros[$name]['equipo1'] = $juego[0];
			$logros[$name]['equipo2'] = $juego[1];

			switch ($logros[$name]['deporte']) {
				case 'Baseball':
					$deporte['beisbol'] += 1;
					break;
				case 'NHL':
					$deporte['hockey'] += 1;
					break;
				case 'American Football':
					$deporte['futbolAmericano'] += 1;
					break;
			};


				foreach ($market->participants as $participant) {
					if($participant->isChange == 0){

						if(trim($juego[2]) == 'Money Line'){
							if($participant->name == $logros[$name]['equipo1']){
								$logros[$name]['moneyLine1'] = $participant->oddsDecimal;
							}
							if($participant->name == $logros[$name]['equipo2']){
								$logros[$name]['moneyLine2'] = $participant->oddsDecimal;
							}
						}

						if(trim($juego[2]) == 'Total Points' || trim($juego[2]) == 'Total Runs' ){
							$logros[$name]['totalPuntos'] = $participant->handicap;
						
							if($participant->name == 'Under'){
								$logros[$name]['totalPuntosCuotaU'] = $participant->oddsDecimal;
							}
							if($participant->name == 'Over'){
								$logros[$name]['totalPuntosCuotaO'] = $participant->oddsDecimal;
							}
						}

						if(trim($juego[2]) == 'Spread'){
							if($participant->name == $logros[$name]['equipo1']){
								$logros[$name]['totalHandicap1'] = $participant->handicap;
								$logros[$name]['handicapCuota1'] = $participant->oddsDecimal;
							}
							if($participant->name == $logros[$name]['equipo2']){
								$logros[$name]['totalHandicap2'] = $participant->handicap;
								$logros[$name]['handicapCuota2'] = $participant->oddsDecimal;
							}
						}
					}else{
						$participantHist = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
																	->orderBy('id', 'DESC')
																	->first();

						if(trim($juego[2]) == 'Money Line'){
							if($participantHist->name == $logros[$name]['equipo1']){
								$logros[$name]['moneyLine1'] = $participantHist->oddsDecimal;
							}
							if($participantHist->name == $logros[$name]['equipo2']){
								$logros[$name]['moneyLine2'] = $participantHist->oddsDecimal;
							}
						}
						if(trim($juego[2]) == 'Total Points' || trim($juego[2]) == 'Total Runs' ){
							$logros[$name]['totalPuntos'] = $participantHist->handicap;
						
							if($participantHist->name == 'Under'){
								$logros[$name]['totalPuntosCuotaU'] = $participantHist->oddsDecimal;
							}
							if($participantHist->name == 'Over'){
								$logros[$name]['totalPuntosCuotaO'] = $participantHist->oddsDecimal;
							}
						}
						if(trim($juego[2]) == 'Spread'){
							if($participantHist->name == $logros[$name]['equipo1']){
								$logros[$name]['totalHandicap1'] = $participantHist->handicap;
								$logros[$name]['handicapCuota1'] = $participantHist->oddsDecimal;
							}
							if($participantHist->name == $logros[$name]['equipo2']){
								$logros[$name]['totalHandicap2'] = $participantHist->handicap;
								$logros[$name]['handicapCuota2'] = $participantHist->oddsDecimal;
							}
						}
					}
				}
			}
		}
		return view('home.index', compact('logros', 'deporte'));
	}


    public function getMasCompetencias($type, $name){
        $nombre          = 'Más Apuestas';
        $marketExp       = explode('-', $name);
        $markets         = getCompetencias($type, trim($marketExp[0]));
        $participantHist = [];

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

        switch ($type) {
        	case 'NFL':
        		$route = 'futbolAmericano.competicion';
        		break;
        	case 'MLB':
        		$route = 'beisbol.competicion';
        		break;

        	case 'NHL':
        		$route = 'hockey.competicion';
        		break;
        }

      
        return view($route, compact('markets', 'market', 'type', 'nombre', 'participantHist'));
    }
}
