<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\Download;
use App\Models\Install;
use App\Models\Ipa;
use App\Models\Itms;
use App\Models\Stats\StatBuffer;
use App\Models\View;
use App\Summary\SummaryDownload;
use App\Summary\SummaryInstall;
use App\Summary\SummaryUse;
use App\Summary\SummaryView;
use Artisan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class LegacySummaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SummaryView::truncate();
        SummaryDownload::truncate();
        SummaryInstall::truncate();
        SummaryUse::truncate();
        StatBuffer::truncate();

        $appCount = App::count();
        $ipaCount = Ipa::count();
        $itmsCount = Itms::count();

        for ($i = 0; $i < 30; $i++) {
            static::makeSummary(App::class, $appCount, 100);
            static::makeSummary(Itms::class, $itmsCount, 100);
            static::makeSummary(Ipa::class, $ipaCount, 100);
        }

        Artisan::call('stats:migrate');
        Artisan::call('optimize:clear');
    }

    public static function makeStats($class, $amount) {
        $maxDate = now()->endOfWeek(Carbon::SATURDAY);
        $minDate = now()->subMonths(3)->startOfWeek(Carbon::SUNDAY);

        $diffMin = (-$minDate->diffInDays(now(), false)) . " days";
        $diffMax = (-$maxDate->diffInDays(now(), false)) . " days";

        $items = [];
        for ($i = 0; $i < $amount; $i++) {
            $items[] = [
                'trigger_id' => fake()->numberBetween(1, 5),
                'trigger_type' => $class,
                'amount' => fake()->randomNumber(2),
                'created_at' => Carbon::parse(fake()->dateTimeBetween($diffMin, $diffMax)),
            ];
        }
        return $items;
    }

    public static function makeSummary($class, $count, $amount)
    {
        SummaryView::insert(static::makeStats($class, $amount));
        SummaryInstall::insert(static::makeStats($class, $amount));
        SummaryDownload::insert(static::makeStats($class, $amount));
        SummaryUse::insert(static::makeStats($class, $amount));
    }
}
