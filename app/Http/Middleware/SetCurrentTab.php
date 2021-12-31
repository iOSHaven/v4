<?php

namespace App\Http\Middleware;

use Closure;

class SetCurrentTab
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $tab)
    {
        $request->session()->flash('current_tab', $tab);

        return $next($request);
    }
}
