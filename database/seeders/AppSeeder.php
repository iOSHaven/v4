<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\Ipa;
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
        for ($i = 0; $i < 10; $i++) {
            App::factory(10)
                ->hasAttached(Ipa::factory(fake()->numberBetween(0, 6)))
                ->create();
        }

    }
}
