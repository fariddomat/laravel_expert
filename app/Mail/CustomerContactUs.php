<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\CustomerContactUs as ContactUs;

class CustomerContactUs extends Mailable
{
    use Queueable, SerializesModels;


    public $contactUs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactUs $contactUs)
    {
        $this->contactUs = $contactUs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('card-ordrer@digitsmark.com')
            ->subject('New Contact Us')
            ->view('emails.customerContactUs');
    }
}
