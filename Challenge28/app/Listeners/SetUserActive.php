<?php

namespace App\Listeners;

use App\Events\ActivateUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
 
class SetUserActive
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
     * @param  ActivateUserEvent  $event
     * @return void
     */
    public function handle(ActivateUserEvent $event)
    {
        $event->user->is_active = 1;

        $event->user->save();
    }
}
