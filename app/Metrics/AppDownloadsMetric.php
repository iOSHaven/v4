<?php

namespace App\Metrics;

use App\Http\Requests\MetricRequest;
use App\Models\App;
use App\Summary\SummaryDownload;

class AppDownloadsMetric extends Metric
{
    public function title(MetricRequest $request)
    {
        return 'App Downloads';
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
