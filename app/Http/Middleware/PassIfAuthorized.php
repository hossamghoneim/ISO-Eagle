<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PassIfAuthorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the current user is not a client admin
        if (auth()->user()->client_id) {
            // Handle unauthorized access here, e.g., redirect or show an error message
            return abort(403, 'Unauthorized');
        }

        // Proceed with the request
        return $next($request);
    }
}
