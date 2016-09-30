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
        Commands\XmlCommand::class,
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
        
        $clase_id = Clase::where('name', 'Baseball')->first()->id;
        if($clase_id != null){
            $minutos  = TiempoLectura::where('clase_id', $clase_id)->first()->minutos; 
        }else{
            $minutos = '20';
        }

        $schedule->command('xml:beisbol')->cron('/'.$minutos.' * *  * * *');
    }
}
