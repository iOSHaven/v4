<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\Ipa;
use App\Models\Itms;
use App\Summary\SummaryDownload;
use App\Summary\SummaryInstall;
use App\Summary\SummaryUse;
use App\Summary\SummaryView;
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

        for ($i = 0; $i < 30; $i++) {
            static::make(App::class, App::count(), 100);
            static::make(Itms::class, App::count(), 100);
            static::make(Ipa::class, App::count(), 100);
        }
    }

    public static function make($class, $count, $amount)
    {
        $items = [];
        for ($i = 0; $i < $amount; $i++) {
            $items[] = SummaryView::factory([
                'trigger_id' => fake()->numberBetween(1, $count),
                'trigger_type' => $class,
                'created_at' => Carbon::make(fake()->dateTimeBetween('-6 years', '-1 year', 'America/chicago'))->toDateTime(),
            ])->make()->toArray();
        }
        SummaryView::insert($items);

        $items = [];
        for ($i = 0; $i < $amount; $i++) {
            $items[] = SummaryInstall::factory([
                'trigger_id' => fake()->numberBetween(1, $count),
                'trigger_type' => $class,
                'created_at' => Carbon::make(fake()->dateTimeBetween('-6 years', '-1 year', 'America/chicago'))->toDateTime(),
            ])->make()->toArray();
        }
        SummaryInstall::insert($items);

        $items = [];
        for ($i = 0; $i < $amount; $i++) {
            $items[] = SummaryDownload::factory([
                'trigger_id' => fake()->numberBetween(1, $count),
                'trigger_type' => $class,
                'created_at' => Carbon::make(fake()->dateTimeBetween('-6 years', '-1 year', 'America/chicago'))->toDateTime(),
            ])->make()->toArray();
        }
        SummaryDownload::insert($items);

        $items = [];
        for ($i = 0; $i < $amount; $i++) {
            $items[] = SummaryUse::factory([
                'trigger_id' => fake()->numberBetween(1, $count),
                'trigger_type' => $class,
                'created_at' => Carbon::make(fake()->dateTimeBetween('-6 years', '-1 year', 'America/chicago'))->toDateTime(),
            ])->make()->toArray();
        }
        SummaryUse::insert($items);
    }
}
