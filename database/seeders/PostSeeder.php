<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        User::factory()->hasPosts(10)->count(10)->create();
    }
}
