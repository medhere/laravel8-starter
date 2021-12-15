<?php 

use App\Mail\NewMail;
use Illuminate\Support\Facades\Mail;
    Mail::to('email', 'name')
            // OR->addAddresses(string|array $address)
        ->cc($moreUsers)
        ->bcc($evenMoreUsers)
        ->send(new NewMail($id));

    //Multiple
    // foreach (['taylor@example.com', 'dries@example.com'] as $recipient) {
    //     Mail::to($recipient)->send(new OrderShipped($order));
    // }
    
    // Mail::mailer('postmark')->to($request->user())->send(new Orders($order));
        
