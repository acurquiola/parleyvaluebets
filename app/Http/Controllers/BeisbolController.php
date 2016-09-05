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
		$name    = 'Division Winner';
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
}
