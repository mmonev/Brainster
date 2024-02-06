<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class ValidationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @property \App\Models\User $user
     */
    protected $user;

    /**
     * @property string $url
     */
    protected $url;

    /**
     * Create a new message instance.
     * @param  \App\Models\User $user
     * @param string $url  verification url
     * @return void
     */
    public function __construct(User $user, string $url)
    {
        $this->user = $user;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->from('m.monev93@gmail.com')->markdown('emails.validation', [
            'user' => $this->user,
            'url' => $this->url
        ]);
    }
}
