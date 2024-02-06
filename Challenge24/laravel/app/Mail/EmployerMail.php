<?php

namespace App\Mail;

use App\Http\Requests\EmployeeRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployerMail extends Mailable
{
    use Queueable, SerializesModels;


    protected $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmployeeRequest $request)
    {
        $this->details = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.employment_request' , [
            'details' => $this->details
        ]);
    }
}
