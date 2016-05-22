<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use XmlParser;
use App\Models\Type;
use App\Models\Market;
use App\Models\participant;

class XmlReaderController extends Controller
{
	public function index()
	{

		$xml     = XmlParser::load('http://localhost/parleyvaluebets/xmlFiles/Baseball_16_06_2016.xml');
		$content = $xml->getContent();

		foreach ($content->response->williamhill->class->type as $type) {
				$typeNew                 = new  Type();
				$typeNew->typeID         = $type['id'];
				$typeNew->name           = $type['name'];
				$typeNew->lastUpdateDate = $type['lastUpdateDate'];
				$typeNew->lastUpdateTime = $type['lastUpdateTime'];
				$typeNew->save();
	
			foreach ($type->market as $market) {
					$marketNew                 = new  Market();
					$marketNew->marketID       = $market['id'];
					$marketNew->name           = $market['name'];
					$marketNew->betTillDate    = $market['betTillDate'];
					$marketNew->betTillTime    = $market['betTillTime'];
					$marketNew->lastUpdateDate = $market['lastUpdateDate'];
					$marketNew->lastUpdateTime = $market['lastUpdateTime'];
					$marketNew->type_id        = $typeNew->id;
					$marketNew->save();
				
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
			}
		}

		$type        =Type::all();
		$market      =Market::all();
		$participant =Participant::all();

		dd($type, $market, $participant);
		return view('welcome', compact('valores'));
    }

}
