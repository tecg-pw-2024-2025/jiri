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
        /*User::factory(3)
            ->hasJiris(2)
            ->hasContacts(10)
            ->hasProjects(5)
            ->create()
            ->each(function ($user) {
                $user->jiris->each(function ($jiri) use ($user) {
                    $user->contacts->random(3)->each(function ($contact) use ($jiri) {
                        $jiri->contacts()->attach(
                            $contact,
                            [
                                'role' => random_int(0, 1) ?
                                    ContactRoles::Evaluator->value :
                                    ContactRoles::Student->value
                            ]
                        );
                    });
                });
            });
        $dominique = User::factory()
            ->hasJiris(3)
            ->hasContacts(10)
            ->hasProjects(5)
            ->create(['email' => 'dominique.vilain@hepl.be']);
        $dominique->jiris->each(function ($jiri) use ($dominique) {
            $dominique->contacts->random(3)->each(function ($contact) use ($jiri) {
                $jiri->contacts()->attach(
                    $contact,
                    [
                        'role' => random_int(0, 1) ?
                            ContactRoles::Evaluator->value :
                            ContactRoles::Student->value
                    ]
                );
            });
        });*/

        User::factory(3)
            ->has(
                Jiri::factory()
                    ->count(5)
                    ->hasAttached(
                        Contact::factory()
                            ->count(10)
                            ->state(function (array $attributes, Jiri $jiri) {
                                return ['user_id' => $jiri->user_id];
                            }),
                        fn() => [
                            'role' => random_int(0, 1) ?
                                ContactRoles::Evaluator->value :
                                ContactRoles::Student->value
                        ]
                    )
                    ->hasAttached(
                        Project::factory()
                            ->count(5)
                            ->state(function (array $attributes, Jiri $jiri) {
                                return ['user_id' => $jiri->user_id];
                            })
                    )
            )
            ->create();

        User::factory()
            ->has(
                Jiri::factory()
                    ->count(5)
                    ->hasAttached(
                        Contact::factory()
                            ->count(10)
                            ->state(function (array $attributes, Jiri $jiri) {
                                // Transmettre l'user_id du Jiri aux Contacts
                                return ['user_id' => $jiri->user_id];
                            }),
                        fn() => [
                            'role' => random_int(0, 1) ?
                                ContactRoles::Evaluator->value :
                                ContactRoles::Student->value
                        ]
                    )
                    ->hasAttached(
                        Project::factory()
                            ->count(5)
                            ->state(function (array $attributes, Jiri $jiri) {
                                return ['user_id' => $jiri->user_id];
                            })
                    )
            )
            ->create(['email' => 'dominique.vilain@hepl.be']);
    }
}
