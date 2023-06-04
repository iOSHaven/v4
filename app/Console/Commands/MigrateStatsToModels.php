<?php

namespace App\Console\Commands;

use App\Actions\Stats\RecordEvent;
use App\Models\App;
use App\Models\Enums\Stats\Event;
use App\Models\Ipa;
use App\Models\Itms;
use App\Models\Shortcut;
use App\Models\Stats\StatBuffer;
use Illuminate\Console\Command;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;

class MigrateStatsToModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Take the rolling totals from the stats table update models';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // apps
        $this->loop(App::cursor(), function ($model) {
            event(new \App\Events\ViewEvent($model));
            event(new \App\Events\DownloadEvent($model));
            event(new \App\Events\InstallEvent($model));
        });

        // itms
        $this->loop(Itms::cursor(), function ($model) {
            event(new \App\Events\ViewEvent($model));
            event(new \App\Events\DownloadEvent($model));
            event(new \App\Events\InstallEvent($model));
        });

        // ipas
        $this->loop(Ipa::cursor(), function ($model) {
            event(new \App\Events\ViewEvent($model));
            event(new \App\Events\DownloadEvent($model));
            event(new \App\Events\InstallEvent($model));
        });

        // shortcuts
        $this->loop(Shortcut::cursor(), function ($model) {
            event(new \App\Events\ViewEvent($model));
            event(new \App\Events\DownloadEvent($model));
            event(new \App\Events\InstallEvent($model));
        });
        return 0;
    }


    public function loop(LazyCollection $models, callable $callback)
    {
        $model = $models->first();
        if (is_null($model)) return;
        $class = get_class($model);
        $type = str(class_basename($class))->lower()->value();

        $count = $models->count();
        $bar = $this->output->createProgressBar($count);

        $this->output->writeln("\nSyncing ".$count.' '.Str::plural($type, $count));
        $bar->start();

        foreach ($models as $model) {
            call_user_func($callback,
                $model,
            );

            $bar->advance();
        }

    }
}
