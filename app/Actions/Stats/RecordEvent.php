<?php

namespace App\Actions\Stats;

use App\Models\Enums\Stats\Event;
use App\Models\Stats\StatBuffer;
use App\Models\Stats\Target;
use Carbon\Carbon;
use DB;
use Spatie\QueueableAction\QueueableAction;

class RecordEvent
{
    use QueueableAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(
        ?Target $target,
        Event $event,
        Carbon $when,
        int $amount = 1,
        int $for_id = null,
        string $for_type = null,
    ) {
        $day = $when->dayOfWeek + 1;
        $bucket = $when->startOfWeek(Carbon::SUNDAY);

        $combo = [
            'target_id' => $for_id ?? $target->getKey(),
            'target_type' => $for_type ?? get_class($target),
            'event' => $event,
        ];

        $attributes = [
            ...$combo,
            'created_at' => $bucket,
        ];

        $stat = StatBuffer::firstOrNew($attributes);

        $stat->forceFill([
            ...$attributes,
            "day_{$day}" => DB::raw("day_{$day} + {$amount}"),
            'total' => DB::raw("total + {$amount}"),
            'running_total' => $stat->isDirty()
                ? StatBuffer::where($combo)->orderBy('created_at', 'desc')->first()?->running_total + $amount
                : DB::raw("running_total + {$amount}"),
        ])->save();

        return $stat;
    }
}
