<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && auth()->user()->role !== 'Admin' && auth()->user()->role !== 'Data entry') {
            return new Response('Forbidden', 403);
        } else if (auth()->user() && auth()->user()->role !== 'Admin') {
            return new Response('Forbidden User', 403);
        }
        return $next($request);
    }
}
