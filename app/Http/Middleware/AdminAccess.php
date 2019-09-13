<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAccess
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
        // check if current logged in user has admin role
        if (Auth::user()->hasRole('admin')) {
            return $next($request);
        }

        return redirect('/');
    }
}
