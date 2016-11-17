<?php

namespace App\Listeners;

use App\Events\SendMeMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HacerSendMeMail
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
     * @param  SendMeMail  $event
     * @return void
     */
    public function handle(SendMeMail $event)
    {
        //
    }
}
