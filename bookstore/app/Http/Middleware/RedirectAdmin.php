<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class RedirectAdmin
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
        if(!Auth::guard('admins')->check()) {
            return redirect('/registeradmin');
        }
        return $next($request);
    }
}
