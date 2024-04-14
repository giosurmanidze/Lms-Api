<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Check if the user is authenticated and has a role assigned
        if ($request->user() && $request->user()->role && in_array($request->user()->role->name, $roles)) {
            return $next($request);
        }

        return abort(403, 'Unauthorized action.');
    }
}
