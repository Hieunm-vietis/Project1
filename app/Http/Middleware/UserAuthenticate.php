<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = "web")
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('users.showFormLogin');
        }

        return $next($request);
    }
}
