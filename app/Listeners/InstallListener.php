<?php

namespace App\Listeners;

use App\Install;
use App\Summary\SummaryInstall;
use Illuminate\Support\Facades\DB;

class InstallListener
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        if (config('app-analytics.installs')) {
            SummaryInstall::whereMorphedTo('trigger', $event->model)
                ->updateOrCreate([
                    "created_at" => now()->floorDay(),
                ], [
                    "amount" => DB::raw("amount + 1")
                ]);

            $event->model->installs += 1;
            $event->model->save();
        }
    }
}
