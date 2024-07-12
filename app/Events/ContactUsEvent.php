<?php

namespace App\Events;

use App\Models\ContactRequest;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContactUsEvent
{
    use Dispatchable, SerializesModels;

    public $contactRequest;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ContactRequest $contactRequest)
    {
        $this->contactRequest = $contactRequest;
    }
}
