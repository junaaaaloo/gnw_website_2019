<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Editor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::check() && Auth::user()->hasRole('editor')) {
            return $next($request);
        } elseif (Auth::check() && (Auth::user()->hasRole('administrator') || Auth::user()->hasRole('subscriber'))) {
            return redirect('/home');
        } else {
            return redirect('/');
        }
    }
}
