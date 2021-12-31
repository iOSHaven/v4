<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // dd($request->all());
        if (Auth::guard($guard)->check()) {
            if ($request->has('redirect')) {
                return redirect()->intended($request->get('redirect'));
            }

            return redirect()->intended('/apps');
        }

        return $next($request);
    }
}
