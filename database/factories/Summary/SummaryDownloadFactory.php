<?php

namespace Database\Factories\Summary;

use App\Summary\SummaryDownload;
use Database\Factories\AppFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SummaryDownloadFactory extends Factory
{
    protected $model = SummaryDownload::class;

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
}
