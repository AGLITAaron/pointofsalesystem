<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;


class CheckDatabaseConfigured
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


    public function handle($request, Closure $next)
    {
        // If we are on setup routes, don't check to avoid redirect loop
        if (config('app.installed') == false && !$request->is('setup*')) {
            return redirect('/setup');
        }

        if (config('app.installed') == true && $request->is('setup*')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
