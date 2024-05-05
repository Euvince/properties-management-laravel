<?php

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use App\Mail\PropertyContactMail;
use App\Events\ContactRequestEvent;

class ContactEventSubscriber
{

    function __construct(private readonly Mailer $mailer)
    {
    }

    public function sendEmailForContact (ContactRequestEvent $event) {
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }
}
