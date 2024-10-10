<?php

namespace Database\Seeders;

use App\Enums\ContactRoles;
use App\Models\Contact;
use App\Models\Jiri;
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
        User::factory(2)
            ->has(
                Jiri::factory()
                    ->count(2)
                    ->hasAttached(
                        Contact::factory()
                            ->count(3)
                            ->state(fn(array $attributes, Jiri $jiri) => ['user_id' => $jiri->user_id]),
                        fn() => [
                            'role' => random_int(0, 1) ?
                                ContactRoles::Evaluator->value :
                                ContactRoles::Student->value
                        ]
                    )
                    ->hasAttached(
                        Project::factory()
                            ->count(2)
                            ->state(fn(array $attributes, Jiri $jiri) => ['user_id' => $jiri->user_id])
                    )
            )
            ->create();

        User::factory()
            ->has(
                Jiri::factory()
                    ->count(2)
                    ->hasAttached(
                        Contact::factory()
                            ->count(3)
                            ->state(fn(array $attributes, Jiri $jiri) => ['user_id' => $jiri->user_id]),
                        fn() => [
                            'role' => random_int(0, 1) ?
                                ContactRoles::Evaluator->value :
                                ContactRoles::Student->value
                        ]
                    )
                    ->hasAttached(
                        Project::factory()
                            ->count(2)
                            ->state(fn(array $attributes, Jiri $jiri) => ['user_id' => $jiri->user_id])
                    )
            )
            ->create([
                'email' => 'dominique.vilain@hepl.be',
                'first_name' => 'Dominique',
                'last_name' => 'Vilain',
            ]);
    }
}
