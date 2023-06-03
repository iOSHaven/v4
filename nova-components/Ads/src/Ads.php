<?php

namespace Ioshaven\Ads;

use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class Ads extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('ads', __DIR__.'/../dist/js/tool.js');
        Nova::style('ads', __DIR__.'/../dist/css/tool.css');
        Nova::script('stripe', 'https://js.stripe.com/v3/');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('ads::navigation', [
            'intent' => Auth::user()->createSetupIntent(),
        ]);
        // return view('ads::navigation');
    }
}
