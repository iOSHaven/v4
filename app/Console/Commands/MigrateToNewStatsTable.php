<?php

namespace App\Console\Commands;

use App\Actions\Stats\RecordEvent;
use App\Models\Enums\Stats\Event;
use App\Summary\SummaryDownload;
use App\Summary\SummaryInstall;
use App\Summary\SummaryUse;
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
        $this->loop(SummaryView::with(['trigger'])->orderBy('created_at', 'asc')->cursor(),
            function (SummaryView $model, Event $event, Carbon $when) use ($action) {
                $action->execute(
                    target: null,
                    event: $event,
                    when: $when,
                    amount: $model->amount,
                    for_id: $model->trigger_id,
                    for_type: $model->trigger_type
                );
            }
        );

        // Downloads
        $this->loop(SummaryDownload::with(['trigger'])->orderBy('created_at', 'asc')->cursor(),
            function (SummaryDownload $model, Event $event, Carbon $when) use ($action) {
                $action->execute(
                    target: null,
                    event: $event,
                    when: $when,
                    amount: $model->amount,
                    for_id: $model->trigger_id,
                    for_type: $model->trigger_type
                );
            }
        );

        // Installs
        $this->loop(SummaryInstall::with(['trigger'])->orderBy('created_at', 'asc')->cursor(),
            function (SummaryInstall $model, Event $event, Carbon $when) use ($action) {
                $action->execute(
                    target: null,
                    event: $event,
                    when: $when,
                    amount: $model->amount,
                    for_id: $model->trigger_id,
                    for_type: $model->trigger_type
                );
            }
        );

        // Uses
        $this->loop(SummaryUse::with(['trigger'])->orderBy('created_at', 'asc')->cursor(),
            function (SummaryUse $model, Event $event, Carbon $when) use ($action) {
                $action->execute(
                    target: null,
                    event: $event,
                    when: $when,
                    amount: $model->amount,
                    for_id: $model->trigger_id,
                    for_type: $model->trigger_type
                );
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

        $this->output->writeln("\nTransferring ".$count.' '.Str::plural($type, $count));
        $bar->start();

        foreach ($models as $model) {
            call_user_func($callback,
                $model,
                Event::from($type),
                $model->created_at ?? now(),
            );

            $bar->advance();
        }

    }
}
