<?php

namespace Database\Factories;

use App\Models\Ipa;
use App\Models\Itms;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    public static $ipas;
    public static $itms;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->company();
        return [
            'name' => $name,
            'revoked' => fake()->boolean(10),
            'avatar' => fake()->imageUrl(50, 50),
            'parsingIdentifier' => Str::slug($name),
            'website' => fake()->url(),
            ...AppFactory::fakeTimestamps(),
        ];
    }

    public function withExistingIpas($count=null) {
        static::$ipas ??= Ipa::get(['id'])->pluck('id');
        $count ??= fake()->numberBetween(0,20);
        return $this->afterCreating(function (Provider $provider) use ($count) {
            $provider->ipas()->sync(static::$ipas->random($count));
        });
    }

    public function withExistingItms($count=null) {
        static::$itms ??= Itms::get(['id'])->pluck('id');
        $count ??= fake()->numberBetween(0,20);
        return $this->afterCreating(function (Provider $provider) use ($count) {
            $provider->itms()->sync(static::$itms->random($count));
        });
    }
}
