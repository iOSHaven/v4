<?php

namespace App\Nova\Metrics;

use App\Models\Enums\Stats\Event;
use App\Models\Stats\StatBuffer;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;
use Laravel\Nova\Metrics\TrendResult;

class PerDay extends Trend
{
    protected $model;

    protected $trigger;

    protected $type;

    protected $relation;

    protected Event $event;

    public function model($model)
    {
        $this->model ??= $model;
        // $this->name = Str::plural(class_basename($this->model));
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

    public static function queryStatBuffer($relation, $event, $startingDate, $trigger, $user): Builder
    {
        $query = StatBuffer::buffers($startingDate)
            ->where('event', $event);

        if ($user->isAdmin) {
            $result = $query->whereHasMorph('target', $trigger);
        } else {
            $ids = $user->{$relation}->pluck('id');
            $result = $query
                ->whereHasMorph('target', $trigger, function ($query) use ($ids) {
                    $query->whereIn('id', $ids);
                });
        }

        return $result;
    }

    public function calculate(NovaRequest $request)
    {
        $dayOfWeek = now()->dayOfWeek + 1;
        $offset = 7 - $dayOfWeek;
        $startingDate = $this->getAggregateStartingDate($request, self::BY_DAYS);

        $query = static::queryStatBuffer(
            relation: $this->relation(),
            event: $this->event?->value ?? 'view',
            startingDate: $startingDate->subDays($offset),
            trigger: $this->trigger,
            user: Auth::user()
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
        return now();
        return now()->addMinutes(config('app-analytics.cache'));
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
