<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use XmlParser;
use App\Models\Type;
use App\Models\Market;
use App\Models\Participant;
use App\Models\HistoricoLogro;
use Carbon\Carbon;

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

        return view('home.partials.table', compact('markets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getXml()
    {
        $xml     = XmlParser::load('http://185.81.165.215/baseball/Baseball.20160901+03:00:01');
        $content = $xml->getContent();

        foreach ($content->response->williamhill->class->type as $type) {
                $types = Type::where('typeID', $type['id'])->orderBy('created_at', 'DESC')->first();
                if ($types == NULL){
                    $typeNew                 = new  Type();
                    $typeNew->typeID         = $type['id'];
                    $typeNew->name           = $type['name'];
                    $typeNew->lastUpdateDate = $type['lastUpdateDate'];
                    $typeNew->lastUpdateTime = $type['lastUpdateTime'];
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
                            $participantNew->market_id      = $market->id;
                            $participantNew->save();
                        }else{
                            //Si existe se busca si tiene una incidencia en el histórico
                            $participantsHist = HistoricoLogro::where('participantID', $participant['id'])
                                                                ->orderBy('created_at', 'DESC')
                                                                ->first();
                            if($participantsHist == NULL){

                                //Si no tiene incidencia y la fecha y hora del registro son menores a la del ultimo registro guardado se crea una nueva incidencia
                                if (($participants->lastUpdateDate < $participant['lastUpdateDate']) || (($participants->lastUpdateDate = $participant['lastUpdateDate'])  && $participants->lastUpdateTime < $participant['lastUpdateTime'] )){
                                    if ($participants->oddsDecimal != $participant['oddsDecimal']){
                                        $marketNew = $markets;
                                        $participantHist                 = new  HistoricoLogro();
                                        $participantHist->participantID  = $participant['id'];
                                        $participantHist->name           = $participant['name'];
                                        $participantHist->oddsDecimal    = $participant['oddsDecimal'];
                                        $participantHist->lastUpdateDate = $participant['lastUpdateDate'];
                                        $participantHist->lastUpdateTime = $participant['lastUpdateTime'];
                                        $participantHist->participant_id = $participants->id;
                                        $participantHist->save();
                                        $participants->update(['isChange'=>true]);
                                    }else{
                                        $participants->update(['lastUpdateDate'=>$participant['lastUpdateDate'],'lastUpdateTime'=>$participant['lastUpdateTime']]);
                                    }
                                }
                            //Si tiene histórico se verifican la fecha y hora de creación si es menor la almacenada se registran
                            }elseif(($participantsHist->lastUpdateDate < $participant['lastUpdateDate']) || (($participantsHist->lastUpdateDate = $participant['lastUpdateDate'])  && $participantsHist->lastUpdateTime < $participant['lastUpdateTime'] )){
                                //Si existe el participant buscado y no ha sido cambiado se almacena directamente en el histórico
                                if ($participants->oddsDecimal != $participant['oddsDecimal']){
                            
                                    $marketNew = $markets;
                                    $participantHist                 = new  HistoricoLogro();
                                    $participantHist->participantID  = $participant['id'];
                                    $participantHist->name           = $participant['name'];
                                    $participantHist->oddsDecimal    = $participant['oddsDecimal'];
                                    $participantHist->lastUpdateDate = $participant['lastUpdateDate'];
                                    $participantHist->lastUpdateTime = $participant['lastUpdateTime'];
                                    $participantHist->participant_id = $participants->id;
                                    $participantHist->save();
                                }else{
                                    $participants->update(['lastUpdateDate'=>$participant['lastUpdateDate'],'lastUpdateTime'=>$participant['lastUpdateTime']]);
                                }
                            }
                        }
                    }
                }
            }
        }
    return view('home.index');
    }
}
