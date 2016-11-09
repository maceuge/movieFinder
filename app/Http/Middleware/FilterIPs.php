<?php

namespace App\Http\Middleware;

use Closure;

class FilterIPs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->ip != '127.0.0.1') {
            abort(404);
        }
        return $next($request);

        \Log::info('Request Reciver');
    }
}
