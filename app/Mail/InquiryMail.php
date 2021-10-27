<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $detailsInquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detailsInquiry)
    {
        //
        $this->detailsInquiry = $detailsInquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->detailsInquiry['inquiry_list']);
        return $this->from($this->detailsInquiry['email'],$this->detailsInquiry['name'])->subject('Inquiry - Message from '.$this->detailsInquiry['name'])->view('emails.inquiry-mail');
    }
}
