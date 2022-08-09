<?php

namespace App\Metrics;

use App\App;
use App\Download;
use App\Http\Requests\MetricRequest;
use App\Install;
use App\Provider;
use App\Summary\SummaryView;
use App\View;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Jetstream;

class AppViewsMetric extends Metric
{

    public function title(MetricRequest $request)
    {
        return "App Views";
    }

    public function calculateSeries(MetricRequest $request)
    {
        return $this->providerStatSeries(SummaryView::class, App::class, $request);
    }

    public function cacheFor()
    {
         return now()->addMinutes(20);
    }
}