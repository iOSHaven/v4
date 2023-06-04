<?php

namespace App\Console\Commands;

use App\Actions\Stats\RecordEvent;
use App\Models\Enums\Stats\Event;
use App\Models\Stats\Target;
use App\Summary\SummaryView;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;

class MigrateToNewStatsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate old stat table data to new stat table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(RecordEvent $action)
    {
        // Views
        $this->loop(SummaryView::cursor(),
            function (SummaryView $model, Target $target, Event $event, Carbon $when) use ($action) {
                $action->execute($target, $event, $when, $model->amount);
            }
        );

        return 0;
    }

    public function loop(LazyCollection $models, callable $callback)
    {
        $model = $models->first();
        $class = get_class($model);
        $type = str(class_basename($class))->after('Summary')->lower()->value();

        $count = $models->count();
        $bar = $this->output->createProgressBar($count);

        $this->output->writeln('Transferring '.$count.' '.Str::plural($type, $count));
        $bar->start();

        foreach ($models as $model) {
            call_user_func($callback,
                $model,
                $model->trigger,
                Event::from($type),
                $model->created_at ?? now(),
            );

            $bar->advance();
        }

    }
}
