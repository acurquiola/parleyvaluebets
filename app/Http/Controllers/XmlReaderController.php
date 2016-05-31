<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use XmlParser;
use App\Models\Type;
use App\Models\Market;
use App\Models\Participant;
use App\Models\HistoricoLogro;

class XmlReaderController extends Controller
{
	public function index()
	{

		$xml     = XmlParser::load('http://localhost/parleyvaluebets/xmlFiles/Baseball_16_06_2016.xml');
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
				//Se busca el último Market registrado con el ID leído.
				$markets = Market::with('participants')->where('marketID', $market['id'])->orderBy('created_at', 'DESC')->first();
				if ($markets == NULL){
					//Si  no existe se crea.
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
				}elseif (($markets->lastUpdateDate < $market['lastUpdateDate']) || (($markets->lastUpdateDate = $market['lastUpdateDate'])  && $markets->lastUpdateTime < $market['lastUpdateTime'] )){
					//Si existe el market buscado y los datos de última actualización son menores a los leidos se registran los participants en la tabla histórico
					foreach ($market->participant as $participant) {
						$marketNew = $markets;
						$participantHist                 = new  HistoricoLogro();
						$participantHist->participantID  = $participant['id'];
						$participantHist->name           = $participant['name'];
						$participantHist->oddsDecimal    = $participant['oddsDecimal'];
						$participantHist->lastUpdateDate = $participant['lastUpdateDate'];
						$participantHist->lastUpdateTime = $participant['lastUpdateTime'];
						$participantHist->market_id      = $marketNew->id;
						$participantHist->save();
       					$marketNew->update(["isChange"=> true]);
					}
				}
			}
		}

		$type            =Type::all();
		$market          =Market::all();
		$participant     =Participant::all();
		$participantHist =HistoricoLogro::all();

		dd($type, $market, $participant, $participantHist);
		return view('welcome', compact('valores'));
    }

}
