<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\TiempoLectura;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index(){
    	return view('admin.index');
    }

    public function getConfiguracion(){

    	$deportes = \App\Models\Clase::with('tiempos')->get();


    	return view('admin.configuracion.index', compact('lectura', 'deportes'));
    }

    public function postConfiguracion(Request $request){

        $lectura = TiempoLectura::where('clase_id', $request->clase_id)->first();

        if($lectura->count()>0){
            $lectura->update(['minutos' => $request->minutos]);
        }else{
            $lectura = TiempoLectura::create(['minutos' => $request->minutos, 'clase_id' => $request->clase_id]);
        }

        return redirect()->action('AdministradorController@getConfiguracion')->with('status', 'Configuración actualizada exitósamente.');
 	}
}
