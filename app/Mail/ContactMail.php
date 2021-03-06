<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from("$this->details['email_from'],$this->details['name']")->subject('Contact Us - Message from '.$this->details['name'])->view('emails.contact-mail');
        return $this->from("info@equatorial-property.com")->subject('Contact Us - Message from '.$this->details['name'])->view('emails.contact-mail');
    }
}
