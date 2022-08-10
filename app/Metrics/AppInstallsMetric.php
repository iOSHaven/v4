<?php

namespace App\Metrics;

use App\Http\Requests\MetricRequest;
use App\Models\App;
use App\Summary\SummaryInstall;

class AppInstallsMetric extends Metric
{

    public function title(MetricRequest $request)
    {
        return "App Installs";
    }

    public function calculateSeries(MetricRequest $request)
    {
        return $this->providerStatSeries(SummaryInstall::class, App::class, $request);
    }

    public function cacheFor()
    {
         return now()->addMinutes(20);
    }
}