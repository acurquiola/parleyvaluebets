<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Participant;
use App\Models\Market;
use Carbon\Carbon;

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

    public function getDivisionWinner(){
    	$today   = Carbon::now();
    	$name    = '- Division Winner';
    	$markets = Market::with('participants')->where(function ($query) use ($today, $name){
    		$query->where('betTillDate', '>', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%');
    	})->orWhere(function($query) use ($today, $name){
    		$query->where('betTillDate', '=', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%')
    		->where('betTillTime', '>', $today->toTimeString());
    	})->orderBy('betTillDate', 'ASC')
    	->orderBy('betTillTime', 'ASC')
    	->get();

    	return view('beisbol.divisionWinner', compact('markets'));
    }

    public function getWorldSerieWinner(){
    	$today   = Carbon::now();
    	$name    = '- World Series Winner';
    	$markets = Market::with('participants')->where(function ($query) use ($today, $name){
    		$query->where('betTillDate', '>', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%');
    	})->orWhere(function($query) use ($today, $name){
    		$query->where('betTillDate', '=', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%')
    		->where('betTillTime', '>', $today->toTimeString());
    	})->orderBy('betTillDate', 'ASC')
    	->orderBy('betTillTime', 'ASC')
    	->get();

    	return view('beisbol.worldSerieWinner', compact('markets'));
    }

    public function getNationalLeagueWinner(){
    	$today   = Carbon::now();
    	$name    = '- National League';
    	$markets = Market::with('participants')->where(function ($query) use ($today, $name){
    		$query->where('betTillDate', '>', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%');
    	})->orWhere(function($query) use ($today, $name){
    		$query->where('betTillDate', '=', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%')
    		->where('betTillTime', '>', $today->toTimeString());
    	})->orderBy('betTillDate', 'ASC')
    	->orderBy('betTillTime', 'ASC')
    	->get();

    	return view('beisbol.nationalLeagueWinner', compact('markets'));
    }

    public function getAmericanLeagueWinner(){
    	$today   = Carbon::now();
    	$name    = '- American League';
    	$markets = Market::with('participants')->where(function ($query) use ($today, $name){
    		$query->where('betTillDate', '>', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%');
    	})->orWhere(function($query) use ($today, $name){
    		$query->where('betTillDate', '=', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%')
    		->where('betTillTime', '>', $today->toTimeString());
    	})->orderBy('betTillDate', 'ASC')
    	->orderBy('betTillTime', 'ASC')
    	->get();

    	return view('beisbol.americanLeagueWinner', compact('markets'));
    }

    public function getWinningDivision(){
    	$today   = Carbon::now();
    	$name    = '- Winning Division';
    	$markets = Market::with('participants')->where(function ($query) use ($today, $name){
    		$query->where('betTillDate', '>', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%');
    	})->orWhere(function($query) use ($today, $name){
    		$query->where('betTillDate', '=', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%')
    		->where('betTillTime', '>', $today->toTimeString());
    	})->orderBy('betTillDate', 'ASC')
    	->orderBy('betTillTime', 'ASC')
    	->get();

    	return view('beisbol.winningDivision', compact('markets'));
    }

    public function getFirstInningTotalRun(){
    	$today   = Carbon::now();
    	$name    = '- 1st Innings Total Runs';
    	$markets = Market::with('participants')->where(function ($query) use ($today, $name){
    		$query->where('betTillDate', '>', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%');
    	})->orWhere(function($query) use ($today, $name){
    		$query->where('betTillDate', '=', $today->toDateString())
    		->where('name', 'like', '%'.$name.'%')
    		->where('betTillTime', '>', $today->toTimeString());
    	})->orderBy('betTillDate', 'ASC')
    	->orderBy('betTillTime', 'ASC')
    	->get();

    	return view('beisbol.firstInningTotalRun', compact('markets'));
    }
}
