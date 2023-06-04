<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\Ipa;
use App\Models\Itms;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        $loops = 10;
        $maxLinks = 6;
        for ($i = 0; $i < $loops; $i++) {
            App::factory(floor($count / $loops))
                ->hasAttached(Ipa::factory(fake()->numberBetween(0, $maxLinks)))
                ->hasAttached(Itms::factory(fake()->numberBetween(0, $maxLinks)))
                ->create();
        }

    }
}
