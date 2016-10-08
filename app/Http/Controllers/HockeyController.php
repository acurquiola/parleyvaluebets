<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Clase;
use App\Models\Market;
use App\Models\Type;
use Illuminate\Http\Request;

class HockeyController extends Controller
{
    public function index()
    {
    	return view('hockey.index', compact('competiciones', 'nombres', 'className'));
    }

    public function getCompeticiones($typeID, $competicion)
    {
		$type            = Type::find($typeID);
		$markets         = getCompetencias($type->name, $competicion);
		$nombre          = $competicion;
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
      
        return view('hockey.competicion', compact('markets', 'nombre', 'participantHist'));
    }

    public function getMasCompetencias($typeID, $competicion){
		$nombre          = 'Más Apuestas';
		$marketExp       = explode('-', $competicion);
		$type            = Type::find($typeID);
		$markets         = getCompetencias($type->name, $marketExp[0]);
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
      
        return view('hockey.competicion', compact('markets', 'market', 'nombre', 'participantHist'));
    }
}
