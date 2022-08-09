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
            SummaryInstall::updateOrCreate([
                "trigger_id" => $event->model->id,
                "trigger_type" => get_class($event->model),
                "created_at" => now()->floorDay(),
            ], [
                "amount" => DB::raw("amount + 1")
            ]);

            $event->model->installs += 1;
            $event->model->save();
        }
    }
}
