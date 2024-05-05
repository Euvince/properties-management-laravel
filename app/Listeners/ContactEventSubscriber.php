<?php

namespace App\Listeners;

use Illuminate\Mail\Mailer;
use App\Mail\PropertyContactMail;
use App\Events\ContactRequestEvent;
use Illuminate\Contracts\Events\Dispatcher;

class ContactEventSubscriber
{

    function __construct(private readonly Mailer $mailer)
    {
    }

    function sendEmailForContact (ContactRequestEvent $event) {
        $this->mailer->send(new PropertyContactMail($event->property, $event->data));
    }

    function subscribe (Dispatcher $dispatcher) : array {
        /* $dispatcher->listen(
            ContactRequestEvent::class, [
                ContactRequestEvent::class, 'sendEmailForContact'
            ]
        ); */

        return [
            ContactRequestEvent::class, 'sendEmailForContact'
        ];
    }

}
