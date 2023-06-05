<?php

namespace App\Nova\Metrics;

use App\Models\Enums\Stats\Event;
use App\Models\Stats\StatBuffer;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;
use Laravel\Nova\Metrics\TrendResult;

class PerDayPerResource extends Trend
{
    protected $model;

    protected $trigger;

    protected $type;

    protected $relation;

    protected Event $event;

    private $resource;

    public function model($model)
    {
        $this->model ??= $model;
        // $this->setName(Str::plural(class_basename($this->model)));
        return $this;
    }

    public function trigger($trigger)
    {
        $this->trigger ??= $trigger;

        return $this;
    }

    public function event(Event $event)
    {
        $this->event ??= $event;

        return $this;
    }

    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    protected function getData($startingDate, $resource)
    {
        // $trigger = get_class($resource);
        return $this->model::whereBetween('created_at', [$startingDate, now()])
            ->whereHasMorph('trigger', $this->trigger, function ($query) use ($resource) {
                $query->where('id', $resource->id);
            });
    }

    public static function queryStatBuffer($resource, $event, $startingDate, $trigger): Builder
    {
        $query = StatBuffer::buffers($startingDate)
            ->where('event', $event);

        $result = $query
            ->whereHasMorph('target', $trigger, function ($query) use ($resource) {
                $query->where('id', $resource->id);
            });

        return $result;
    }

    public function calculate(NovaRequest $request)
    {
        $resource = $request->findResourceOrFail();
        $dayOfWeek = now()->dayOfWeek + 1;
        $offset = 7 - $dayOfWeek;
        $startingDate = $this->getAggregateStartingDate($request, self::BY_DAYS);

        $query = static::queryStatBuffer(
            resource: $resource,
            event: $this->event?->value ?? 'view',
            startingDate: $startingDate->subDays($offset),
            trigger: $this->trigger
        );

        $buffer = $query->get()->reduce(
            fn ($c, $v) => array_merge($c, $v->buffer),
            []
        );

        $buffer = array_slice($buffer, $dayOfWeek, -$offset);

        $trend = [];
        $total = 0;

        foreach ($buffer as $item) {
            $trend[$startingDate->format('M d, Y')] = $item;
            $total += $item;

            $startingDate = $startingDate->addDay();
        }

        $result = new TrendResult($total);
        $result->trend($trend);

        return $result;
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
            14 => '14 days',
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
        return now()->addHours(config('app-analytics.cache'));
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return Str::slug($this->name.' '.$this->trigger.' per resource per day');
    }
}
