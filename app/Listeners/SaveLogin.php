<?php

namespace App\Listeners;

use Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    { 
        session(['username' => $event->user->username]);
        // $location  = GeoIP::getLocation();
        $historial = new \App\Models\AccesoUsuario();
        $historial->fecha_entrada = \Carbon\Carbon::now()->toDateString();
        $historial->hora_entrada  = \Carbon\Carbon::now()->toTimeString();
        $historial->user_id       = $event->user->id;
        $historial->ip            = Request::ip();
        $historial->pais          = 'Venezuela';
        // $historial->pais          = $location['country'];
        if($historial->save()){
            session(['acceso' => $historial->id]);
        };
    }
}
