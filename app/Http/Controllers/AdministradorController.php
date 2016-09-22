<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdministradorController extends Controller
{
    public function index(){
    	return view('administrador.index');
    }
}
