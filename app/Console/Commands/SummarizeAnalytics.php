<?php

namespace App\Console\Commands;

use App\Download;
use App\Install;
use App\View;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SummarizeAnalytics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'summarize:analytics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    private function analyticTable($class, $column = null, $summary = null) {
        
        $column = $column ?? Str::plural(strtolower(class_basename($class)));
        $summary = $summary ?? 'summary_' . Str::singular($column);

        $dates = $class::where(function ($query) {
                    return $query->whereColumn('created_at', '>=', 'updated_at')
                    ->orWhereNull('updated_at');
                })
                ->select(DB::raw('date(created_at) as ts'))
                ->groupBy('ts')
                ->get()
                ->pluck('ts');

        foreach($dates as $date) {
            $models = $class::where(function ($query) {
                return $query->whereColumn('created_at', '>=', 'updated_at')
                ->orWhereNull('updated_at');
            })
                ->whereDate('created_at', $date)->get();
            foreach($models as $model) {
                if ($model->trigger) {
                    DB::table($summary)
                        ->lockForUpdate()
                        ->updateOrInsert(
                            [
                                'trigger_type'=> $model->trigger_type, 
                                'trigger_id' => $model->trigger_id, 
                                'created_at' => $date,
                            ],
                            [
                                'amount'=>\DB::raw('amount + 1'),
                            ]
                        );

                    $amount = DB::table($summary)
                    ->where('trigger_id', $model->trigger_id)
                    ->where('trigger_type', $model->trigger_type)
                    ->lockForUpdate()
                    ->sum('amount');
                
                    DB::table($model->trigger->getTable())
                        ->where('id', $model->trigger_id)
                        ->lockForUpdate()
                        ->update([ $column => $amount]);
                }
                $model->touch();
            }
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->analyticTable(View::class, 'impressions', 'summary_view');
        $this->analyticTable(Download::class);
        $this->analyticTable(Install::class);
    }
}
