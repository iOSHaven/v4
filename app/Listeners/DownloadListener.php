<?php

namespace App\Listeners;

use App\Summary\SummaryDownload;
use Illuminate\Support\Facades\DB;

class DownloadListener
{
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        if (config('app-analytics.downloads')) {
            SummaryDownload::updateOrCreate([
                'trigger_id' => $event->model->id,
                'trigger_type' => get_class($event->model),
                'created_at' => now()->floorDay(),
            ], [
                'amount' => DB::raw('amount + 1'),
            ]);

            $event->model->downloads += 1;
            $event->model->save();
        }
    }
}
