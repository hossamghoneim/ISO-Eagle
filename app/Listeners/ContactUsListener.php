<?php

namespace App\Listeners;

use App\Events\ContactUsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ContactUsListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  VendorStatusChanged  $event
     * @return void
     */
    public function handle(ContactUsEvent $event)
    {
        // Logic to send the email Iso.procurement@gmail.com
        $contactRequest = $event->contactRequest;

        Mail::to('hossamghoneim11@gmail.com')->send(new \App\Mail\ContactUsMail($contactRequest));
    }
}
