<?php

namespace App\Nova\Metrics;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;

class PerDay extends Trend
{
    protected $model;

    protected $trigger;

    protected $type;

    protected $relation;

    public function model($model)
    {
        $this->model = $this->model ?? $model;
        // $this->name = Str::plural(class_basename($this->model));
        return $this;
    }

    public function trigger($trigger)
    {
        $this->trigger = $this->trigger ?? $trigger;

        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    // public function type() {
    //     return $this->type = $this->trigger ?? 'App/' . class_basename($this->trigger);
    // }

    protected function relation()
    {
        return $this->relation ?? strtolower(Str::plural(class_basename($this->trigger)));
    }

    protected function getData($startingDate)
    {
        $relation = $this->relation();

        if (Auth::user()->isAdmin) {
            return $this->model::whereBetween('created_at', [$startingDate, now()])
                ->whereHasMorph('trigger', $this->trigger);
        } else {
            return $this->model::whereBetween('created_at', [$startingDate, now()])
                ->whereHasMorph('trigger', $this->trigger, function ($query) use ($relation) {
                    $query->whereIn('id', Auth::user()->{$relation}->pluck('id'));
                });
        }
    }

    public function calculate(NovaRequest $request)
    {
        // $this->result(10);
        $startingDate = $this->getAggregateStartingDate($request, self::BY_DAYS);

        return $this->sumByDays($request, $this->getData($startingDate), 'amount')
        // ->result($this->sumByDays($request, $this->getData(), ));
            ->result($this->getData($startingDate)->sum('amount'));
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
        return now()->addHours(2);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return Str::slug($this->name.' '.$this->trigger.' per day');
    }
}
