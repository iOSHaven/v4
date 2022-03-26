<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SpecifiesLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->route()->parameter('localeIdentifier', 'en');
        $request->route()->forgetParameter('localeIdentifier');
        if (array_key_exists($locale, config('localization.supportedLocales'))) {
            session()->put('locale', $locale);
        }
        return $next($request);
    }
}
