<?php

namespace Database\Seeders;

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
        User::factory(5)
            ->hasJiris(5)
            ->hasContacts(10)
            ->hasProjects(5)
            ->create()
            ->each(function ($user) {
                $user->jiris->each(function ($jiri) use ($user) {
                    $jiri->students()->attach(
                        $user->contacts->random(10)
                    );
                });
            });
        User::factory()
            ->hasJiris(5)
            ->hasContacts(10)
            ->hasProjects(5)
            ->create(['email' => 'dominique.vilain@hepl.be'])
            ->each(function ($user) {
                $user->jiris->each(function ($jiri) use ($user) {
                    $jiri->evaluators()->attach(
                        $user->contacts->random(10)
                    );
                });
            });
    }
}
