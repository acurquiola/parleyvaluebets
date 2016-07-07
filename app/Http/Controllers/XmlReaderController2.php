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
	public function index()
	{
		return view('index');
    }
}
