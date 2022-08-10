<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PdfNotesDownloadMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email-template.download-notes')->subject('Download Notes - ' . $this->details['title'] . ' Notes by ' . $this->details['faculty_name'] . ' - TopLad')->from('info@toplad.in', strtoupper($this->details['segment']));
    }
}
