<?php

namespace App\Metrics;

use App\Http\Requests\MetricRequest;

abstract class Metric
{

    abstract public function title(MetricRequest $request);
    abstract public function calculateSeries(MetricRequest $request);


    public function calculateLabels(MetricRequest $request) {
        $result = [];
        for ($i = $request->selectedRangeKey - 1; $i >= 0; $i--)
        {
            $result[] = now()->subDay($i)->toFormattedDateString();
        }
        return $result;
    }

    public function calculateValue(MetricRequest $request) {
        return collect(static::calculateSeries($request)[0])->sum('value');
    }

    private function renderRanges(MetricRequest $request) {
        return collect($this->ranges($request))->reduce(function ($carry, $value, $key) {
            $carry[] = [
                "value" => $key,
                "label" => $value
            ];
            return $carry;
        }, []);
    }


    public function render(MetricRequest $request)
    {
        $cacheToken = static::cacheToken($request) . $request->selectedRangeKey;

        $data = (!empty(static::cacheFor()) ?  cache($cacheToken) : null ) ?? [
            "title" => static::title($request),
            "series" => static::calculateSeries($request),
            "labels" => static::calculateLabels($request),
            "ranges" => static::renderRanges($request),
            "value" => static::calculateValue($request),
        ];

        if (static::cacheFor() && !cache()->has($cacheToken)) {
            cache([$cacheToken => $data], static::cacheFor());
        }

        return $data;
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges(MetricRequest $request)
    {
        return [
            7 => __('7 Days'),
            30 => __('30 Days'),
            60 => __('60 Days'),
            90 => __('90 Days'),
        ];
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int|null
     */
    public function cacheFor()
    {
//         return now()->addMinutes(5);
    }

    public function cacheToken(MetricRequest $request)
    {
        return static::class;
    }


}