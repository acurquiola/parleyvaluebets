<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BeisbolController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        $markets         = getMarkets($name);
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
		$markets     = getMarkets($name);
		$nombre      = 'Ganador de Liga Nacional';
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

    //Ganador de Liga Americana
    public function getAmericanLeagueWinner(){
		$name        = '- American League';
		$markets     = getMarkets($name);
		$nombre      = 'Ganador de Liga Americana';
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

    //Ganador de División
    public function getDivisionWinner(){
		$name    = '- Division Winner';
		$markets = getMarkets($name);
		$nombre  = 'Ganador de División';
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

    //Liga Ganadora
    public function getWinningLeague(){
		$name        = '- Winning League';
		$markets     = getMarkets($name);
		$nombre      = 'Liga Ganadora';
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

    //División Ganadora
    public function getWinningDivision(){
		$name        = '- Winning Division';
		$markets     = getMarkets($name);
		$nombre      = 'División Ganadora';
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

    //Total Carreras en 1er Inning
    public function getFirstInningTotalRun(){
		$name    = '- 1st Innings Total Runs';
		$markets = getMarkets($name);
		$nombre  = 'Total de Carreras en 1er Inning';
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

    //Total Apuestas en 1er Inning
    public function getFirstInningBetting(){
		$name    = '- 1st Innings Betting';
		$markets = getMarkets($name);
		$nombre  = 'Apuestas en 1er Inning';
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

    //Ganador del Partido
    public function getMoneyLine(){
		$name    = 'Money Line';
		$markets = getMarkets($name);
		$nombre  = 'Ganador del Partido';
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

    //Total de carreras
    public function getTotalRuns(){
		$name    = '- Total Runs';
		$markets = getMarkets($name);
		$nombre  = 'Total de Carreras';
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

    //Primer jugador en dar HR
    public function getFirstPlayerHitHR(){
		$name    = '- First Player To Hit A Home Run';
		$markets = getMarkets($name);
		$nombre  = 'Primer Jugador que conseguirá Home Run';
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


    //Jugador en dar HR
    public function getPlayerHitHR(){
		$name    = '- Player To Hit A Home Run';
		$markets = getMarkets($name);
		$nombre  = 'Jugador que conseguirá Home Run';
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

    public function getMoreMarkets($market){
		$nombre  = 'Más Apuestas';
		$marketExp  = explode('-', $market);
		$markets = getMarkets($marketExp[0]);
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
      
        return view('beisbol.competicion', compact('markets', 'market', 'nombre', 'participantHist'));
    }


}
