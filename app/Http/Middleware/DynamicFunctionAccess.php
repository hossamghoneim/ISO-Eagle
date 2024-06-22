<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DynamicFunctionAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$allowedFunctions): Response
    {
        if (auth()->user()->client_id)
        {
            $currentActionMethod = $request->route()->getActionMethod();
            if (in_array($currentActionMethod, $allowedFunctions))
            {
                return abort(403, 'Unauthorized');
            }
            return $next($request);
        }
        return $next($request);

    }
}
