<?php

namespace Database\Factories\Stats;

use App\Models\App;
use App\Models\Enums\Stats\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stats\StatBuffer>
 */
class StatBufferFactory extends Factory
{
    public static $apps;
    public static $shortcuts;
    public static $itms;
    public static $ipas;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $days = [
            'day_1' => fake()->randomNumber(2),
            'day_2' => fake()->randomNumber(2),
            'day_3' => fake()->randomNumber(2),
            'day_4' => fake()->randomNumber(2),
            'day_5' => fake()->randomNumber(2),
            'day_6' => fake()->randomNumber(2),
            'day_7' => fake()->randomNumber(2),
        ];

        return [
            'target_id' => null,
            'target_type' => null,
            'event' => fake()->randomElement(Event::cases()),
            ...$days,
            'total' => array_sum($days),
            'running_total' => 0,
            'created_at' => Carbon::make(fake()->unique()->dateTimeBetween('-3 months', '+1 day', 'America/Chicago'))->startOfWeek(),
        ];
    }

    public function forApp() {
        static::$apps ??= App::get(['id'])->pluck('id');
        return $this->state([
            'target_type' => App::class,
            'target_id' => static::$apps->random(),
        ]);
    }
}
