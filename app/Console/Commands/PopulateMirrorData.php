<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\App;
use App\Provider;
use App\Mirror;
use Carbon\Carbon;

class PopulateMirrorData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:mirrors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Go through the mirror table and update the data from the plists.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $mirrors = Mirror::where(function ($q) {
                    $q->whereColumn('updated_at', '>', 'fetched_at')
                        ->orWhereNull('fetched_at')
                        ->orWhere('updated_at', '<', Carbon::now(7)->subDays(7));
                    })
                    ->whereNotNull('install_link')
                    ->get();
        foreach ($mirrors as $mirror) {
            $mirror->createFromPlistURL($mirror->install_link);
        }
    }
}
