<?php

namespace App\Http\Middleware;

use App\Models\App;
use App\Models\Shortcut;
use Closure;

class HasUpdates
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
        $apps = App::recently_updated()->count();
        $shortcuts = Shortcut::recently_updated()->count();
        $updates = $apps + $shortcuts;
        view()->composer('*', function ($view) use ($updates, $request) {
            $view->with([
                'hasUpdates' => $updates > 0,
                'updateCount' => $updates,
            ]);
        });

        return $next($request);
    }
}
