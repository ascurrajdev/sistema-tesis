<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\SendEmailVerification;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailVerificationListener
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
     * @param  \App\Events\SendEmailVerification  $event
     * @return void
     */
    public function handle(SendEmailVerification $sendEmailVerification)
    {
        
    }
}
