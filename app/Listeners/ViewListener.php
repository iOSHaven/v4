<?php

namespace App\Listeners;

use App\Events\ViewEvent;
use App\Summary\SummaryView;
use App\View;
use Illuminate\Support\Facades\DB;

class ViewListener
{
    public function __construct()
    {
        //
    }

    public function handle(ViewEvent $event)
    {
        if (config('app-analytics.views')) {
                SummaryView::whereMorphedTo('trigger', $event->model)
                    ->updateOrCreate([
                        "created_at" => now()->floorDay(),
                    ], [
                        "amount" => DB::raw("amount + 1")
                    ]);

                $event->model->impressions += 1;
                $event->model->save();
        }
    }
}
