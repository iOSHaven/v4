<?php

namespace App\Metrics;

use App\Http\Requests\MetricRequest;
use Illuminate\Support\Facades\DB;

abstract class Metric
{
    abstract public function title(MetricRequest $request);

    abstract public function calculateSeries(MetricRequest $request);

    public function providerStatSeries(string $summaryClass, string $targetClass, MetricRequest $request)
    {
        $seriesARaw = $this->selectProviderMetric($summaryClass, $targetClass, $request);

        $result = [];
        for ($i = $request->selectedRangeKey - 1; $i >= 0; $i--) {
            $date = now()->subDay($i);
            $key = $date->toDateString();
            $result[] = [
                'meta' => $date->toFormattedDateString(),
                'value' => $seriesARaw[$key] ?? 0,
            ];
        }

        return [$result];
    }

    public function selectProviderMetric(string $summaryClass, string $targetClass, MetricRequest $request)
    {
        $provider = $request->user()->currentTeam->provider;

        $providerQuery = fn ($q) => $q->where('providers.id', $provider->id);

        $app_ids = $targetClass::whereHas('itms.providers', $providerQuery)
            ->orWhereHas('ipas.providers', $providerQuery)
            ->pluck('id');

        if (empty($provider)) {
            return [[]];
        }

        return $summaryClass::whereHasMorph('trigger', $targetClass,
            fn ($q) => $q->whereIn('id', $app_ids))
            ->whereDate('created_at', '>', now()->subDays($request->selectedRangeKey))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as stat'))
            ->groupBy('date')
            ->pluck('stat', 'date');
    }

    public function calculateLabels(MetricRequest $request)
    {
        $result = [];
        for ($i = $request->selectedRangeKey - 1; $i >= 0; $i--) {
            $result[] = now()->subDay($i)->toFormattedDateString();
        }

        return $result;
    }

    public function calculateValue(MetricRequest $request)
    {
        return collect(static::calculateSeries($request)[0])->sum('value');
    }

    private function renderRanges(MetricRequest $request)
    {
        return collect($this->ranges($request))->reduce(function ($carry, $value, $key) {
            $carry[] = [
                'value' => $key,
                'label' => $value,
            ];

            return $carry;
        }, []);
    }

    public function render(MetricRequest $request)
    {
        $cacheToken = static::cacheToken($request).$request->selectedRangeKey;

        $data = (! empty(static::cacheFor()) ? cache($cacheToken) : null) ?? [
            'title' => static::title($request),
            'series' => static::calculateSeries($request),
            'labels' => static::calculateLabels($request),
            'ranges' => static::renderRanges($request),
            'value' => static::calculateValue($request),
        ];

        if (static::cacheFor() && ! cache()->has($cacheToken)) {
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
