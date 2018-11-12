<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Subscriber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::check() && Auth::user()->hasRole('subscriber')) {
            return $next($request);
        } elseif (Auth::check() && (Auth::user()->hasRole('editor') || Auth::user()->hasRole('administrator'))) {
            return redirect('/home');
        } else {
            return redirect('/');
        }
    }
}
