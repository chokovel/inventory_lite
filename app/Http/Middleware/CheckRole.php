<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {

        // Log::alert($roles);
        // Log::alert(Auth::user()->hasRole($roles));
        // return;
        if (!Auth::check() || !Auth::user()->hasRole($roles)) {

            return redirect()->route('login')->with('error', 'You are not logged in!');;
        }

        return $next($request);
    }
}
