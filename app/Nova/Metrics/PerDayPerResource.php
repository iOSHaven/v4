<?php

namespace App\Nova\Metrics;

use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;
use Illuminate\Support\Str;
use Log;

class PerDayPerResource extends Trend
{

    protected $model;
    protected $trigger;
    protected $type;
    protected $relation;
    private $resource;

    public function model($model) {
        $this->model = $this->model ?? $model;
        // $this->setName(Str::plural(class_basename($this->model)));
        return $this;
    }

    public function trigger($trigger) {
        $this->trigger = $this->trigger ?? $trigger;
        return $this;
    }

    public function setName($name=null) {
        $this->name = $name;
        return $this;
    }
    

    protected function getData($startingDate, $resource) {
        // $trigger = get_class($resource);
        return $this->model::whereBetween('created_at', [$startingDate, now()])
                ->whereHasMorph('trigger', $this->trigger, function ($query) use ($resource) {
                    $query->where('id', $resource->id);
                });
        
    }

    public function calculate(NovaRequest $request)
    {
        $resource = $request->findResourceOrFail();
        $startingDate = $this->getAggregateStartingDate($request, self::BY_DAYS);
        return $this->sumByDays($request, $this->getData($startingDate, $resource), 'amount')
            // ->showLatestValue()
            ->result(
                // 'asdf'
                $this->getData($startingDate, $resource)
                ->sum('amount')
                // ->whereBetween('created_at', [$startingDate, now()])
                // ->count()
            );
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            7 => "7 days",
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
        return now()->addHours(2);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return Str::slug($this->name . ' ' . $this->trigger . ' per resource per day');
    }
}
