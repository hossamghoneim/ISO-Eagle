<?php

namespace App\Http\Controllers\Api;

use App\Events\ContactUsEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ValidateContactUsRequest;
use App\Models\ContactRequest;

class ContactUsController extends Controller
{
    public function page()
    {
        return $this->success('', [
            'phone' => settings()->get('phone'),
            'email' => settings()->get('email'),
            'address' => settings()->get('address'),
            'location' => settings()->get('location'),
        ]);
    }

    /**
     * Handle the incoming request.
     */
    public function store(ValidateContactUsRequest $request)
    {
        $contactRequest = ContactRequest::create([
            'full_name' => $request->validated()['full_name'],
            'email' => $request->validated()['email'],
            'full_address' => $request->validated()['full_address'],
            'phone' => $request->validated()['phone'],
            'service_type' => $request->validated()['service_type'],
            'message' => $request->validated()['message'],
        ]);

        event(new ContactUsEvent($contactRequest));

        return $this->success("", []);
    }
}
