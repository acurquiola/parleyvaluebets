<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Clase;
use App\Models\HistoricoLogro;
use App\Models\Market;
use App\Models\Participant;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use XmlParser;

class XmlReaderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$today   = Carbon::now();       
    	$markets = Market::with('participants')->where(function ($query) use ($today){
    		$query->where('betTillDate', '>', $today->toDateString());
    	})->orWhere(function($query) use ($today){
    		$query->where('betTillDate', '=', $today->toDateString())
    		->where('betTillTime', '>', $today->toTimeString());
    	})->orderBy('betTillDate', 'ASC')
    	->orderBy('betTillTime', 'ASC')
    	->get();

    	return view('home.reporte', compact('markets'));
    }

    public function getXml()
    {
        	$rutas=[    'http://185.81.165.215/baseball/Baseball',
                        'http://185.81.165.215/baseball/score/correct_score',
                        'http://185.81.165.215/baseball/higher_lower/higher_lower',
                        'http://185.81.165.215/baseball/m_result/m_result',
                        'http://185.81.165.215/baseball/odd_even/odd_even',
                        'http://185.81.165.215/baseball/win_win/win_win',
                        'http://185.81.165.215/baseball/f_score/f_score',
                        'http://185.81.165.215/baseball/ag/ag',
                        'http://185.81.165.215/sport/nhl/nhl',
                        'http://185.81.165.215/sport/nhl/d_chance/double_chance',
                        'http://185.81.165.215/sport/nhl/draw_no_bet/draw_no_bet',
                        'http://185.81.165.215/sport/nhl/higher_lower/higher_lower',
                        'http://185.81.165.215/sport/nhl/m_result/m_result',
                        'http://185.81.165.215/sport/nhl/score/correct_score',
                        'http://185.81.165.215/sport/nhl/western/western',
                        'http://185.81.165.215/sport/nhl/win_win/win_win', 
                        'http://185.81.165.215/sport/nfl/nfl',
                        'http://185.81.165.215/sport/nfl/ag/ag',
                        'http://185.81.165.215/sport/nfl/f_score/f_score',
                        'http://185.81.165.215/sport/nfl/higher_lower/higher_lower',
                        'http://185.81.165.215/sport/nfl/l_score/l_score',
                        'http://185.81.165.215/sport/nfl/m_result/m_result',
                        'http://185.81.165.215/sport/nfl/western/western',
                        'http://185.81.165.215/sport/nfl/win_win/win_win',
                        'http://185.81.165.215/sport/nba/nba', 
                        'http://185.81.165.215/sport/nba/higher_lower/higher_lower',
                        'http://185.81.165.215/sport/nba/m_result/m_result',
                        'http://185.81.165.215/sport/nba/odd_even/odd_even',
                        'http://185.81.165.215/sport/nba/western/western',
                        'http://185.81.165.215/sport/nba/win_win/win_win'
                    ];

    	foreach ($rutas as $index => $ruta) {
    		try {
                $xml     = XmlParser::load($ruta);
                $content = $xml->getContent();

                if(isset($content->response->williamhill->class)){

                    foreach ($content->response->williamhill->class as $class) {
                        $clase = Clase::where('claseID', $class['id'])->orderBy('created_at', 'DESC')->first();
                        if ($clase == NULL){
                            $classNew             = new  CLase();
                            $classNew->claseID    = $class['id'];
                            $classNew->name       = $class['name'];
                            $classNew->maxRepDate = $class['maxRepDate'];
                            $classNew->maxRepTime = $class['maxRepTime'];
                            $classNew->save();
                        }else{
                            $classNew = $clase;
                        }
                        foreach ($content->response->williamhill->class->type as $type) {
                            $types = Type::where('typeID', $type['id'])->orderBy('created_at', 'DESC')->first();
                            if ($types == NULL){
                                $typeNew                 = new  Type();
                                $typeNew->typeID         = $type['id'];
                                $typeNew->name           = $type['name'];
                                $typeNew->lastUpdateDate = $type['lastUpdateDate'];
                                $typeNew->lastUpdateTime = $type['lastUpdateTime'];
                                $typeNew->clase_id       = $classNew->id;
                                $typeNew->save();
                            }else{
                                $typeNew = $types;
                            }
                            foreach ($type->market as $market) {
                                //Se busca el Market registrado con el ID leído.
                                $markets = Market::with('participants')
                                ->where('marketID', $market['id'])
                                ->first();

                                if ($markets == NULL){
                                    //Si no existe se crea.
                                    $marketNew                 = new  Market();
                                    $marketNew->marketID       = $market['id'];
                                    $marketNew->name           = $market['name'];
                                    $marketNew->betTillDate    = $market['betTillDate'];
                                    $marketNew->betTillTime    = $market['betTillTime'];
                                    $marketNew->lastUpdateDate = $market['lastUpdateDate'];
                                    $marketNew->lastUpdateTime = $market['lastUpdateTime'];
                                    $marketNew->type_id        = $typeNew->id;
                                    $marketNew->save();

                                    //Para cada uno de los markets se registran los partipants correspondientes.
                                    foreach ($market->participant as $participant) {
                                        $participantNew                 = new  Participant();
                                        $participantNew->participantID  = $participant['id'];
                                        $participantNew->name           = $participant['name'];
                                        $participantNew->oddsDecimal    = $participant['oddsDecimal'];
                                        $participantNew->lastUpdateDate = $participant['lastUpdateDate'];
                                        $participantNew->lastUpdateTime = $participant['lastUpdateTime'];
                                        $participantNew->handicap       = $participant['handicap'];
                                        $participantNew->market_id      = $marketNew->id;
                                        $participantNew->save();
                                    }
                                }else{
                                    foreach ($market->participant as $participant) {

                                        //Se busca el Participant registrado con el ID leído.
                                        $participants = Participant::where('participantID', $participant['id'])
                                        ->first();

                                        if ($participants == NULL){
                                            //Si no existe se crea un nuevo participant
                                            $participantNew                 = new  Participant();
                                            $participantNew->participantID  = $participant['id'];
                                            $participantNew->name           = $participant['name'];
                                            $participantNew->oddsDecimal    = $participant['oddsDecimal'];
                                            $participantNew->lastUpdateDate = $participant['lastUpdateDate'];
                                            $participantNew->lastUpdateTime = $participant['lastUpdateTime'];
                                            $participantNew->handicap       = $participant['handicap'];
                                            $participantNew->market_id      = $market->id;
                                            $participantNew->save();
                                        }else{
                                            //Si existe se busca si tiene una incidencia en el histórico
                                            $participantsHist = HistoricoLogro::where('participantID', $participant['id'])
                                            ->orderBy('created_at', 'DESC')
                                            ->first();
                                            if($participantsHist == NULL){

                                                //Si no tiene incidencia y la fecha y hora del registro son menores a la del ultimo registro guardado se crea una nueva incidencia
                                                if (($participants->handicap != $participant['handicap']) || ($participants->lastUpdateDate < $participant['lastUpdateDate']) || (($participants->lastUpdateDate = $participant['lastUpdateDate'])  && $participants->lastUpdateTime < $participant['lastUpdateTime'] )){
                                                    if ($participants->oddsDecimal != $participant['oddsDecimal']){
                                                        $marketNew = $markets;
                                                        $participantHist                 = new  HistoricoLogro();
                                                        $participantHist->participantID  = $participant['id'];
                                                        $participantHist->name           = $participant['name'];
                                                        $participantHist->oddsDecimal    = $participant['oddsDecimal'];
                                                        $participantHist->lastUpdateDate = $participant['lastUpdateDate'];
                                                        $participantHist->lastUpdateTime = $participant['lastUpdateTime'];
                                                        $participantHist->handicap       = $participant['handicap'];
                                                        $participantHist->participant_id = $participants->id;
                                                        $participantHist->save();
                                                        $participants->update(['isChange'=>true]);
                                                    }else{
                                                        $participants->update(['handicap'=>$participant['handicap'],'lastUpdateDate'=>$participant['lastUpdateDate'],'lastUpdateTime'=>$participant['lastUpdateTime']]);
                                                    }
                                                }
                                            //Si tiene histórico se verifican la fecha y hora de creación si es menor la almacenada se registran
                                            }elseif(($participants->handicap != $participant['handicap']) || ($participantsHist->lastUpdateDate < $participant['lastUpdateDate']) || (($participantsHist->lastUpdateDate = $participant['lastUpdateDate'])  && $participantsHist->lastUpdateTime < $participant['lastUpdateTime'] )){
                                                //Si existe el participant buscado y no ha sido cambiado se almacena directamente en el histórico
                                                if ($participants->oddsDecimal != $participant['oddsDecimal']){

                                                    $marketNew = $markets;
                                                    $participantHist                 = new  HistoricoLogro();
                                                    $participantHist->participantID  = $participant['id'];
                                                    $participantHist->name           = $participant['name'];
                                                    $participantHist->oddsDecimal    = $participant['oddsDecimal'];
                                                    $participantHist->lastUpdateDate = $participant['lastUpdateDate'];
                                                    $participantHist->lastUpdateTime = $participant['lastUpdateTime'];
                                                    $participantHist->handicap       = $participant['handicap'];
                                                    $participantHist->participant_id = $participants->id;
                                                    $participantHist->save();
                                                }else{
                                                    $participants->update(['handicap'=>$participant['handicap'],'lastUpdateDate'=>$participant['lastUpdateDate'],'lastUpdateTime'=>$participant['lastUpdateTime']]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                Log::info('Logros actualizados exitósamente.');
            } catch (Exception $e) {
                Log::info('Error actualizando los logros.');
            }
    	}
    return redirect('/');
    }
}
