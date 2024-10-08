<?php

use App\Enums\ContactRoles;
use App\Models\{Contact, Jiri, User};

use function Pest\Laravel\{actingAs, patch};

test('a user can not change the role in the attendance belonging to another user', function () {
    $user1 = User::factory()
        ->has(
            Jiri::factory()
                ->hasAttached(
                    Contact::factory()
                        ->state(function (array $attributes, Jiri $jiri) {
                            return ['user_id' => $jiri->user_id];
                        }),
                    [
                        'role' => ContactRoles::Evaluator->value
                    ]
                )
        )
        ->create();

    $user2 = User::factory()
        ->has(
            Jiri::factory()
                ->hasAttached(
                    Contact::factory()
                        ->state(function (array $attributes, Jiri $jiri) {
                            // Transmettre l'user_id du Jiri aux Contacts
                            return ['user_id' => $jiri->user_id];
                        }),
                    [
                        'role' => ContactRoles::Evaluator->value
                    ]
                )
        )
        ->create();

    actingAs($user1);

    patch(route('attendances.update', $user2->jiris->first()->attendances->first()), [
        'role' => ContactRoles::Student->value
    ])->assertForbidden();

});
