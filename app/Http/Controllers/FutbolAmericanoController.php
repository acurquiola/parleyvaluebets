<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FutbolAmericanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('futbolAmericano.index');
    }

    public function getCompetencias($type, $name)
    {
        $markets         = getCompetencias($type, $name);
        $nombre          = $name;

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
      
        return view('futbolAmericano.competicion', compact('markets', 'nombre', 'type', 'participantHist'));
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
      
        return view('futbolAmericano.competicion', compact('markets', 'market', 'type', 'nombre', 'participantHist'));
    }
}
