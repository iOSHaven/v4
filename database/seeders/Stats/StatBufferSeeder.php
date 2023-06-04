<?php

namespace Database\Seeders\Stats;

use App\Models\App;
use App\Models\Enums\Stats\Event;
use App\Models\Stats\StatBuffer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Throwable;

class StatBufferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatBuffer::truncate();

        // Apps
        $models = App::get();
        static::makeEvents($models, Event::cases());
        
    }

    public static function makeEvents($models, $events) {
        foreach($models as $model) {
            foreach($events as $event) {
                $records = [];
                $date = now()->subMonths(4);
                $end = now();
                $total = 0;
                while($date->lt($end)) {
                        $created_at = $date->startOfWeek(Carbon::SUNDAY);

                        $data = StatBuffer::factory([
                            'event' => $event,
                            'created_at' => $created_at->toDateTime(),
                            'updated_at' => $date->endOfWeek(Carbon::SATURDAY)->toDateTime(),
                        ])
                            ->for($model, 'target')
                            ->make()
                            ->toArray();

                        $data['running_total'] = ($total += $data['total']);
                        $records[$created_at->toString()] = $data;
                        
                    $date = $date->addDays(7);
                }
                StatBuffer::insert(array_values($records));
            }
        }
    }
    
}
