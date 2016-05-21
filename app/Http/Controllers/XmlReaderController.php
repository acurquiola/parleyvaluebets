<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use XmlParser;


class XmlReaderController extends Controller
{
	public function index()
	{

		$xml     = XmlParser::load('http://localhost/parleyvaluebets/xmlFiles/Baseball_16_06_2016.xml');
		$content = $xml->getContent();
		$valores = [];
		$count   = 0;
		$aux     = 0;

		foreach ($content->response->williamhill->class->type as $type) {

			$valores[$count] = ['id' 					   => '',
								'name'                     => '',
								'date'                     => '',
								'time'                     => '',
								'betTillDate'              => '',
								'betTillTime'              => '',
								'lastUpdateDate'           => '',
								'lastUpdateTime'           => '',
								'placeAvailable'           => '',
								'forcastAvailable'         => '',
								'tricastAvailable'         => '',
								'eachwayAvailable'         => '',
								'cashoutAvailable'         => '',
								'startingPriceAvailable'   => '',
								'livePriceAvailable'       => '',
								'guarenteedPriceAvailable' => '',
								'firstPriceAvailable'      => '',
								'participant'              => []];

			foreach ($type->market as $market) {
				$valores[$count]['id']                       = $market['id'];
				$valores[$count]['name']                     = $market['name'];
				$valores[$count]['date']                     = $market['date'];
				$valores[$count]['time']                     = $market['time'];
				$valores[$count]['betTillDate']              = $market['betTillDate'];
				$valores[$count]['betTillTime']              = $market['betTillTime'];
				$valores[$count]['lastUpdateDate']           = $market['lastUpdateDate'];
				$valores[$count]['lastUpdateTime']           = $market['lastUpdateTime'];
				$valores[$count]['placeAvailable']           = $market['placeAvailable'];
				$valores[$count]['forcastAvailable']         = $market['forcastAvailable'];
				$valores[$count]['tricastAvailable']         = $market['tricastAvailable'];
				$valores[$count]['eachwayAvailable']         = $market['eachwayAvailable'];
				$valores[$count]['cashoutAvailable']         = $market['cashoutAvailable'];
				$valores[$count]['startingPriceAvailable']   = $market['startingPriceAvailable'];
				$valores[$count]['livePriceAvailable']       = $market['livePriceAvailable'];
				$valores[$count]['guarenteedPriceAvailable'] = $market['guarenteedPriceAvailable'];
				$valores[$count]['firstPriceAvailable']      = $market['firstPriceAvailable'];

				foreach ($market->participant as $participant) {
					$valores[$count]['participant'][$aux]['id']             = $participant['id'];
					$valores[$count]['participant'][$aux]['name']           = $participant['name'];
					$valores[$count]['participant'][$aux]['odds']           = $participant['odds'];
					$valores[$count]['participant'][$aux]['oddsDecimal']    = $participant['oddsDecimal'];
					$valores[$count]['participant'][$aux]['lastUpdateDate'] = $participant['lastUpdateDate'];
					$valores[$count]['participant'][$aux]['lastUpdateTime'] = $participant['lastUpdateTime'];
					$valores[$count]['participant'][$aux]['handicap']       = $participant['handicap'];
					$aux = $aux + 1;
 				}
				$count = $count + 1;
			}
		}
	return view('welcome', compact('valores'));
    }

}
