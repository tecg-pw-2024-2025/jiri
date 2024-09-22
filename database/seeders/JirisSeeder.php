<?php

namespace Database\Seeders;

use App\Models\Jiri;
use Illuminate\Database\Seeder;

class JirisSeeder extends Seeder
{
    public function run(): void
    {
        Jiri::create(['name' => 'Jiri 1', 'starting_at' => now()->sub(1, 'day')]);
        Jiri::create(['name' => 'Jiri 2', 'starting_at' => now()->add(1, 'day')]);
        Jiri::create(['name' => 'Jiri 3', 'starting_at' => now()->add(2, 'weeks')]);
    }
}
