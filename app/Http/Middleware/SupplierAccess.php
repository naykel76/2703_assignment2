<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SupplierAccess
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
        // check if current logged in user has the 'supplier' role using the
        // hasRole() helper function from User.php
        if (Auth::user()->hasRole('supplier')) {
            return $next($request);
        }

        return redirect('/');
    }
}
