<?php

namespace App\Metrics;

use App\Http\Requests\MetricRequest;
use App\Models\App;
use App\Summary\SummaryView;

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