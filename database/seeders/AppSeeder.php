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
        App::factory(100)
            ->hasAttached(Ipa::factory(3))
            ->create();
    }
}
