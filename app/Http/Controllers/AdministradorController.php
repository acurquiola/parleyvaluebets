<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use GeoIP;

class AdministradorController extends Controller
{
    public function index(){
    	$location = GeoIP::getLocation();
    	dd($location);
    	return view('administrador.index');
    }
}
