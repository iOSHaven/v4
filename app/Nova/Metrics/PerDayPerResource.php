<?php

namespace App\Nova\Metrics;

use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;
use Illuminate\Support\Str;

class PerDayPerResource extends Trend
{

    protected $model;
    protected $trigger;
    protected $type;
    protected $relation;
    private $resource;

    public function model($model) {
        $this->model = $this->model ?? $model;
        $this->name = Str::plural(class_basename($this->model));
        return $this;
    }

    // public function trigger($trigger) {
    //     $this->trigger = $this->trigger ?? $trigger;
    //     return $this;
    // }

    public function setName($name) {
        $this->name = $name . " Per Day";
        return $this;
    }
    

    protected function getData() {
        $resource = $this->resource;
        $type = get_class($resource->resource);

        return $this->model::whereHasMorph('trigger', $type, function ($query) use ($resource) {
            $query->where('id', $resource->id);
        });
        
    }

    public function calculate(NovaRequest $request)
    {
        $this->resource = $request->findResourceOrFail();
        $startingDate = $this->getAggregateStartingDate($request, self::BY_DAYS);
        return $this->countByDays($request, $this->getData())
            ->showLatestValue()
            ->result(
                $this->getData()
                ->whereBetween('created_at', [$startingDate, now()])
                ->count()
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
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return Str::slug($this->name);
    }
}
