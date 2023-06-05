<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ipa>
 */
class IpaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->productName(),
            'url' => fake()->url(),
            'working' => fake()->boolean(80),
            ...AppFactory::fakeStats(),
            ...AppFactory::fakeTimestamps(['created_at', 'updated_at']),
        ];
    }
}
