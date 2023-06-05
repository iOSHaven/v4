<?php

namespace App\Models\Stats;

use App\Models\Enums\Stats\Event;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Stores polymorphic relationship of item and statistic type in 7 day buffer.
 */
class StatBuffer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'event' => Event::class,
        'buffer' => 'array',
    ];

    public function target()
    {
        return $this->morphTo('target');
    }

    public static function queryBufferAsArray($min, $max, $order = 'asc')
    {
        $range = match ($order) {
            'asc' => range($min, $max),
            'desc' => range($max, $min),
        };

        $dailyValueColumns = collect($range)
            ->map(fn ($x) => "SUM(day_{$x})")
            ->join(', ",", ');

        $dailyValues = 'CONCAT("[",'.$dailyValueColumns.',"]") AS buffer';

        return DB::raw($dailyValues);
    }

    public function scopeBuffers($query, $startingDate, $endDate = null, $order = 'asc')
    {
        return $query
            ->whereBetween('created_at', [$startingDate, $endDate ?? now()])
            ->groupBy('created_at')
            ->select('created_at', static::queryBufferAsArray(1, 7, $order));

        return $query;
    }
}
