<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if ($request->user() && $request->user()->role === 'admin') {
            // User is authenticated and has the 'admin' role, allow them to proceed
            return $next($request);
        }

        // User is not authenticated or does not have the 'admin' role, return an unauthorized response
        return redirect()->back()->withErrors(['message' => 'Sin autorización para acceder a esta página']);
    }
}
