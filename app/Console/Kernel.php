<?php

namespace App\Console;

use App\Models\Clase;
use App\Models\TiempoLectura;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        Commands\XmlBeisbol::class,
        Commands\XmlHockey::class,
        Commands\XmlFutbolAmericano::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        //     
        
        
        $beisbolID              = Clase::where('name', 'Baseball')->first()->id;
        $hockeyID               = Clase::where('name', 'NHL')->first()->id;
        $futbolAmericanoID      = Clase::where('name', 'American Football')->first()->id;
        $minutosBeisbol         = TiempoLectura::where('clase_id', $beisbolID)->first()->minutos;
        $minutosHockey          = TiempoLectura::where('clase_id', $hockeyID)->first()->minutos;
        $minutosFutbolAmericano = TiempoLectura::where('clase_id', $futbolAmericanoID)->first()->minutos;

        $schedule->command('xml:beisbol')->cron('/'.$minutosBeisbol.' * *  * * *');
        $schedule->command('xml:hockey')->cron('/'.$minutosHockey.' * *  * * *');
        $schedule->command('xml:futbolAmericano')->cron('/'.$minutosFutbolAmericano.' * *  * * *');

    }
}
