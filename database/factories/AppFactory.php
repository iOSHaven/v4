<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\App>
 */
class AppFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => null,
            'name' => fake()->productName(),
            'uid' => Str::random(5),
            'icon' => fake()->imageUrl(50, 50),
            'short' => str(fake()->sentence())->limit(18, end: ''),
            'tags' => static::fakeTags(),
            'version' => fake()->regexify('1?[1-9]{1}\.[1-2]?[0-9]\.1?[1-9]{1,2}'),
            'size' => fake()->numberBetween(1000, 2000000000),
            'approval_status' => fake()->randomElement(['approved', 'denied', 'pending']),
            'approval_message' => fake()->boolean(40) ? fake()->sentence() : null,
            ...static::fakeStats(),
            ...static::fakeTimestamps(),
            'description' => static::fakeMarkdown(),
        ];
    }

    public static function fakeStats($only=['impressions', 'downloads', 'installs', 'uses']) {
        return Arr::only([
            'impressions' => fake()->numberBetween(1000, 2000000000),
            'downloads' => fake()->numberBetween(1000, 2000000000),
            'installs' => fake()->numberBetween(1000, 2000000000),
            'uses' => fake()->numberBetween(1000, 2000000000),
        ], $only);
    }

    public static function fakeTimestamps($only=['created_at', 'updated_at', 'deleted_at']) {
        return Arr::only([
            'created_at' => fake()->dateTimeBetween('-6 years', '-1 year'),
            'updated_at' => fake()->dateTimeBetween('-6 years'),
            'deleted_at' => fake()->boolean(20) ? fake()->dateTimeBetween('-6 years') : null,
        ], $only);
    }

    public static function fakeTags()
    {
        return implode(', ', fake()->randomElements([
            'game', 'hack', 'free', 'movie', 'jailbreak',
            'emulator', 'music', ...fake()->words(6),
        ], fake()->numberBetween(3, 6)));
    }

    public static function fakeMarkdown($sections = 10): string
    {
        $content = [];

        $last = '';
        for ($i = 0; $i < $sections; $i++) {
            $last = fake()->randomElement(Arr::exceptValue([
                'heading', 'p', 'li', 'quote',
            ], [$last]));

            $content[] = match ($last) {
                'heading' => static::fakeHeading(),
                'p' => fake()->paragraph(),
                'li' => static::fakeList(),
                'quote' => static::fakeList(types: ['>']),
            };
        }

        return implode('\n\n', $content);
    }

    public static function fakeHeading()
    {
        return implode(' ', [
            str_repeat('#', fake()->numberBetween(1, 6)),
            fake()->sentence(),
        ]);
    }

    public static function fakeList($lines = 6, $minLines = 3, $randomize = true, $types = ['1.', '*', '-'])
    {
        $content = [];

        if ($randomize) {
            $lines = fake()->numberBetween($minLines, $lines);
        }

        $prefix = fake()->randomElement($types);
        for ($i = 0; $i < $lines; $i++) {
            $content[] = $prefix.' '.fake()->sentence();
        }

        return implode('\n', $content);
    }
}
