<?php

namespace App\Listeners;

use App\Mail\PropertyContactMail;
use App\Events\ContactRequestEvent;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mail)
    {

    }

    /**
     * Handle the event.
     */
    public function handle(ContactRequestEvent $event): void
    {
        $this->mail->send(new PropertyContactMail($event->property, $event->data));
    }
}
