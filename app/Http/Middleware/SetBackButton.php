<?php

namespace App\Http\Middleware;

use Closure;

class SetBackButton
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $back_button)
    {
        $request->session()->put('back_button', $back_button);

        return $next($request);
    }
}
