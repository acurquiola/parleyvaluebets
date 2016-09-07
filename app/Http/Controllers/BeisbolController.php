<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BeisbolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('beisbol.index');
    }

    //Ganador de Serie Mundial
    public function getWorldSerieWinner(){
        $name            = '- World Series Winner';
        $symbol          = '>';
        $markets         = getMarkets($name, $symbol);
        $nombre          = 'Ganador de Serie Mundial';
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

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    //Ganador de Liga Nacional
    public function getNationalLeagueWinner(){
		$name        = '- National League';
		$symbol = '>';
		$markets     = getMarkets($name, $symbol);
		$nombre      = 'Ganador de Liga Nacional';

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    //Ganador de Liga Americana
    public function getAmericanLeagueWinner(){
		$name        = '- American League';
		$symbol = '>';
		$markets     = getMarkets($name, $symbol);
		$nombre      = 'Ganador de Liga Americana';

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    //Ganador de División
    public function getDivisionWinner(){
		$name    = '- Division Winner';
		$symbol = '>';
		$markets = getMarkets($name, $symbol);
		$nombre  = 'Ganador de División';

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    //Liga Ganadora
    public function getWinningLeague(){
		$name        = '- Winning League';
		$symbol = '>';
		$markets     = getMarkets($name, $symbol);
		$nombre      = 'Liga Ganadora';
    	return view('beisbol.competicion', compact('markets', 'nombre'));
    }

    //División Ganadora
    public function getWinningDivision(){
		$name        = '- Winning Division';
		$symbol = '>';
		$markets     = getMarkets($name, $symbol);
		$nombre      = 'División Ganadora';

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    //Total Carreras en 1er Inning
    public function getFirstInningTotalRun(){
		$name    = '- 1st Innings Total Runs';
		$symbol = '>';
		$markets = getMarkets($name, $symbol);
		$nombre  = 'Total de Carreras en 1er Inning';

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    //Total Apuestas en 1er Inning
    public function getFirstInningBetting(){
		$name    = '- 1st Innings Betting';
		$symbol = '>';
		$markets = getMarkets($name, $symbol);
		$nombre  = 'Apuestas en 1er Inning';

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    //Ganador del Partido
    public function getMoneyLine(){
		$name    = ' Money Line';
		$symbol = '>';
		$markets = getMarkets($name, $symbol);
		$nombre  = 'Ganador del Partido';

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    //Total de carreras
    public function getTotalRuns(){
		$name    = '- Total Runs';
		$symbol = '>';
		$markets = getMarkets($name, $symbol);
		$nombre  = 'Total de Carreras';

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    //Primer jugador en dar HR
    public function getFirstPlayerHitHR(){
		$name    = '- First Player To Hit A Home Run';
		$symbol = '>';
		$markets = getMarkets($name, $symbol);
		$nombre  = 'Primer Jugador que conseguirá Home Run';

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }


    //Jugador en dar HR
    public function getPlayerHitHR(){
		$name    = '- Player To Hit A Home Run';
		$symbol = '>';
		$markets = getMarkets($name, $symbol);
		$nombre  = 'Jugador que conseguirá Home Run';

        foreach ($markets as $market) {
            foreach ($market->participants as $participant) {
                if($participant->historico->count() > 0){
                    $participantHist[] = \App\Models\HistoricoLogro::where('participant_id', $participant->id)
                                                                ->orderBy('id', 'DESC')
                                                                ->first();
                }
            }
        }

		

    	return view('beisbol.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    public function getMoreMarkets($market){
		$nombre  = 'Más Apuestas';
		$symbol = '>';
		$marketExp  = explode('-', $market);
		$markets = getMarkets($marketExp[0], $symbol);
		
    	return view('beisbol.competicion', compact('markets', 'nombre', 'market'));
    }


}
