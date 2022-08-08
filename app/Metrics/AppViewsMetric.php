<?php

namespace App\Metrics;

use App\App;
use App\Download;
use App\Http\Requests\MetricRequest;
use App\Install;
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
        $seriesARaw = SummaryView::whereHasMorph('trigger', App::class, function($query) use ($request) {
            return $query->whereIn('id', App::whereHas('itms.providers', function($q) use ($request) {
                $q->where('providers.id', $request->user()->currentTeam->provider->id);
            })->pluck('id'));
        })->whereDate('created_at', '>', now()->subDays($request->selectedRangeKey))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as stat'))
            ->groupBy('date')
            ->pluck('stat', 'date');

        $result = [];
        for ($i = $request->selectedRangeKey - 1; $i >= 0; $i--)
        {
            $date = now()->subDay($i);
            $key = $date->toDateString();
            $result[] = [
                "meta" => $date->toFormattedDateString(),
                "value" => $seriesARaw[$key] ?? 0
            ];
        }
        return [$result];

    }

    public function cacheFor()
    {
//         return now()->addMinutes(5);
    }
}