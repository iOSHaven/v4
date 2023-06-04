<?php

namespace Database\Seeders;

use App\Models\Ipa;
use App\Models\Itms;
use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (! Itms::count()) {
            Itms::factory(300);
        }

        if (! Ipa::count()) {
            Ipa::factory(300);
        }

        Provider::factory(10)
            ->withExistingIpas()
            ->withExistingItms()
            ->create();
    }
}
