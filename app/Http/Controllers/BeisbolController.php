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
		$button  = 0;
		$name    = '- World Series Winner';
		$markets = getMarkets($name);
		$nombre  = 'Ganador de Serie Mundial';
		
		// Todas las apuestas
		$moreMarkets = 'World Series Winner';
		$moreMarkets = getMarkets($moreMarkets);
		

    	return view('beisbol.competicion', compact('markets', 'moreMarkets', 'button', 'nombre'));
    }

    //Ganador de Liga Nacional
    public function getNationalLeagueWinner(){
		$button      = 0;
		$name        = '- National League';
		$markets     = getMarkets($name);
		$nombre      = 'Ganador de Liga Nacional';
		
		// Todas las apuestas
		$moreMarkets = 'National League Outright';
		$moreMarkets = getMarkets($moreMarkets);

    	return view('beisbol.competicion', compact('markets', 'button', 'nombre', 'moreMarkets'));
    }

    //Ganador de Liga Americana
    public function getAmericanLeagueWinner(){
		$button      = 0;
		$name        = '- American League';
		$markets     = getMarkets($name);
		$nombre      = 'Ganador de Liga Americana';
		
		// Todas las apuestas
		$moreMarkets = 'American League Outright';
		$moreMarkets = getMarkets($moreMarkets);


    	return view('beisbol.competicion', compact('markets', 'button', 'nombre', 'moreMarkets'));
    }

    //Ganador de División
    public function getDivisionWinner(){
		$button  = 1;
		$name    = '- Division Winner';
		$markets = getMarkets($name);
		$nombre  = 'Ganador de División';


    	return view('beisbol.competicion', compact('markets', 'button', 'nombre'));
    }

    //Liga Ganadora
    public function getWinningLeague(){
		$button      = 0;
		$name        = '- Winning League';
		$markets     = getMarkets($name);
		$nombre      = 'Liga Ganadora';
		
		// Todas las apuestas
		$moreMarkets = 'World Series Winner';
		$moreMarkets = getMarkets($moreMarkets);
		

    	return view('beisbol.competicion', compact('markets', 'button', 'nombre', 'moreMarkets'));
    }

    //División Ganadora
    public function getWinningDivision(){
		$button      = 1;
		$name        = '- Winning Division';
		$markets     = getMarkets($name);
		$nombre      = 'División Ganadora';

    	return view('beisbol.competicion', compact('markets', 'button', 'nombre'));
    }

    //Total Carreras en 1er Inning
    public function getFirstInningTotalRun(){
		$button  = 1;
		$name    = '- 1st Innings Total Runs';
		$markets = getMarkets($name);
		$nombre  = 'Total de Carreras en 1er Inning';

    	return view('beisbol.competicion', compact('markets', 'button', 'nombre'));
    }

    //Ganador del Partido
    public function getMoneyLine(){
		$button  = 1;
		$name    = ' Money Line';
		$markets = getMarkets($name);
		$nombre  = 'Ganador del Partido';

    	return view('beisbol.competicion', compact('markets', 'button', 'nombre'));
    }

    //Total de carreras
    public function getTotalRuns(){
		$button  = 1;
		$name    = '- Total Runs';
		$markets = getMarkets($name);
		$nombre  = 'Total de Carreras';

    	return view('beisbol.competicion', compact('markets', 'button', 'nombre'));
    }

    public function getMoreMarkets($market){
		$button  = 1;
		$nombre  = 'Más Apuestas';
		$marketExp  = explode('-', $market);
		$markets = getMarkets($marketExp[0]);
		
    	return view('beisbol.competicion', compact('markets', 'button', 'nombre', 'market'));
    }
}
