<?php

namespace App\Listeners;

use App\Events\CreatedUserEvent;
use App\Mail\ValidationEmail;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
 
class SendVerificationEmail
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
     * @param  CreatedUserEvent  $event
     * @return void
     */
    public function handle(CreatedUserEvent $event)
    {
        $user = $event->user;
        
        $url = URL::temporarySignedRoute(
            'validation',
            now()->addSeconds(30),
            [
                'email' => $user->email,
                'hash' =>  $user->remember_token
            ]
        );

        Mail::to("$user->email")->send(new ValidationEmail($user , $url));
    }
}
