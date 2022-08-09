<?php

namespace App\Metrics;

use App\App;
use App\Download;
use App\Http\Requests\MetricRequest;
use App\Summary\SummaryDownload;
use App\View;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Jetstream;

class AppDownloadsMetric extends Metric
{

    public function title(MetricRequest $request)
    {
        return "App Downloads";
    }

    public function calculateSeries(MetricRequest $request)
    {
        return $this->providerStatSeries(SummaryDownload::class, App::class, $request);
    }

    public function cacheFor()
    {
         return now()->addMinutes(20);
    }
}