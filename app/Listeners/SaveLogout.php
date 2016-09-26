<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $historial = \App\Models\AccesoUsuario::find(session('acceso'));
        $historial->update(['fecha_salida' => \Carbon\Carbon::now()->toDateString(), 
                            'hora_salida' => \Carbon\Carbon::now()->toTimeString()]);
    }
}
