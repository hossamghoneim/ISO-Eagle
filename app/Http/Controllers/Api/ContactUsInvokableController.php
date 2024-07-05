<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ValidateContactUsRequest;
use App\Models\ContactRequest;

class ContactUsInvokableController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ValidateContactUsRequest $request)
    {
        ContactRequest::create([
            'full_name' => $request->validated()['full_name'],
            'email' => $request->validated()['email'],
            'full_address' => $request->validated()['full_address'],
            'phone' => $request->validated()['phone'],
            'service_type' => $request->validated()['service_type'],
            'message' => $request->validated()['message'],
        ]);

        return $this->success("", []);
    }
}
