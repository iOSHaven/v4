<?php

namespace Database\Factories\Summary;

use App\Summary\SummaryView;
use Database\Factories\AppFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SummaryViewFactory extends Factory
{
    protected $model = SummaryView::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'amount' => fake()->randomNumber(2),
            ...AppFactory::fakeTimestamps(['created_at']),
        ];
    }

    public function withFakeTrigger($class, $count)
    {
        return $this->state([
            'trigger_id' => fake()->numberBetween(1, $count),
            'trigger_type' => $class,
        ]);
    }
}
