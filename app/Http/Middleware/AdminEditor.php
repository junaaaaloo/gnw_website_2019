<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::check() && Auth::user()->hasRole('administrator') || (Auth::user()->hasRole('editor'))) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
