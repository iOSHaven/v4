<?php

namespace ioshaven\v4;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class DashboardSidebar extends Tool
{

    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('dashboard-sidebar::navigation', $this->config);
    }
}
