<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendConfirmationMail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {        
        Mail::send('emails.confirmacion', ['user' => $this->user], function(Message $mail){
            $mail->from('info@parleyvaluebets.ru', 'INFO ParleyValueBets');
            $mail->subject('Confirmación de correo electrónico');
            $mail->to($this->user->email, $this->user->name);

        });
    }
}
