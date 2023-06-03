<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Itms>
 */
class ItmsFactory extends Factory
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
            'url' => static::fakeItms(),
            'working' => fake()->boolean(80),
            ...AppFactory::fakeStats(),
            ...AppFactory::fakeTimestamps(['created_at', 'updated_at']),
        ];
    }

    public static function fakeItms($scheme="itms-services", $base='', $params=[]) {
        $query = http_build_query([
            'action' => 'download-manifest',
            'url' => urlencode(fake()->url()),
            ...$params,
        ]);
        return "{$scheme}://{$base}?{$query}";
    }
}
