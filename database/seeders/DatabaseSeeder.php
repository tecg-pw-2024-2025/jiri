<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)
            ->hasJiris(20)
            ->create();
        User::factory()
            ->hasJiris(20)
            ->create(['email' => 'dominique.vilain@hepl.be']);

        Contact::factory(10)->create();
        Project::factory(10)->create();
    }
}
