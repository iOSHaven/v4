<?php

namespace App\Models\Stats;

use App\Models\Enums\Stats\Event;
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
    ];

    public function target()
    {
        return $this->morphTo('target');
    }
}
