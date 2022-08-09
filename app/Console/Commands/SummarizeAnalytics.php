<?php

namespace App\Console\Commands;

use App\Download;
use App\Install;
use App\Summary\SummaryDownload;
use App\Summary\SummaryInstall;
use App\Summary\SummaryView;
use App\View;
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

    private function analyticTable($class, $summaryClass, $column = null, $summary = null)
    {
        $column = $column ?? Str::plural(strtolower(class_basename($class)));

        $query = $class::where(fn($query) =>
            $query->whereColumn('created_at', '>=', 'updated_at')
                  ->orWhereNull('updated_at')
            )
            ->select('trigger_type',
                'trigger_id',
                DB::raw("CAST(DATE(created_at) as DATETIME) as created_at"),
                DB::raw('count(*) as amount')
            );

        $summary = $query
            ->groupBy('trigger_type', 'trigger_id', 'created_at')
            ->get()
            ->map(fn($x) => array_merge($x->toArray(), [
                "created_at" => $x->created_at->toDateTimeString()
            ]));

        $totals = $query
            ->groupBy('trigger_type', 'trigger_id', 'created_at')
            ->get();

        $bar = $this->output->createProgressBar($totals->count());

        foreach($totals as $total) {
            if (class_exists($total->trigger_type)) {
                $total->trigger->$column += $total->amount;
                $total->trigger->save();
                $bar->advance();
            }
        }

        $summaryClass::upsert($summary->toArray(),
            ['trigger_type', 'trigger_id', 'created_at'],
            ['created_at', 'amount']);

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->analyticTable(View::class, SummaryView::class,'impressions', 'summary_view');
        $this->analyticTable(Download::class, SummaryDownload::class);
        $this->analyticTable(Install::class, SummaryInstall::class);
    }
}
