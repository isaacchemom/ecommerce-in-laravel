<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class shopmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $fileTittle;
    
    public $myprice;
    public $myphoto;
    /**
     * Create a new message instance.
     */
    public function __construct($mailData,$fileTittle,$myprice,$myphoto)
    {
        //

        $this->mailData= $mailData;
        $this->fileTittle= $fileTittle;
      
        $this->myprice= $myprice;
        $this->myphoto=$myphoto;;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mailData['body']
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];

       
      // return [
       // Attachment::fromPath($this->mailData['attachment'])
          //  ->as($this->fileTittle)
          //  ->withMime('image/jpeg')
    //];
    }
}
