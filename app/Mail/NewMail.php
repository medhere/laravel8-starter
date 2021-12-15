<?php

// create resources/views/emails
//new theme for Markdown = new CSS file in html/themes directory. update the theme option of config/mail.php configuration

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user){
        $this->user = $user;
    }

    public function build()
    {
        return $this->from('example@example.com', 'Example')
            ->replyTo('email', 'name')
            ->subject('subject')
            ->priority(1)   //2,3    
            ->view('emails.newmail')->with([
                'orderPrice' => $this->user
            ])
                // OR
            ->markdown('emails.newmail', [
                'orderPrice' => $this->user,
            ])
            ->attach('/path/to/file')
            ->attachFromStorage('/path/to/file','name.ext');    
    }
}
