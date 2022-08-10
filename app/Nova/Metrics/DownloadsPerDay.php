<?php

namespace App\Nova\Metrics;

use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;

class DownloadsPerDay extends Trend
{
    private $type;

    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    public function userRelation($relation)
    {
        $this->relation = $relation;

        return $this;
    }

    private function getData()
    {
        $relation = $this->relation;

        return Download::whereHasMorph('trigger', $this->type, function ($query) use ($relation) {
            $query->whereIn('id', Auth::user()->{$relation}->pluck('id'));
        });
    }

    public function calculate(NovaRequest $request)
    {
        return $this->countByDays($request, $this->getData())->showLatestValue();
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            7 => '7 days',
            30 => '30 Days',
            60 => '60 Days',
            90 => '90 Days',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'downloads-per-day';
    }
}
