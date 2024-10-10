<?php

use App\Models\Jiri;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

beforeEach(function () {
    $this->user = User::factory()
        ->hasContacts(2)
        ->create();

    $this->otherUser = User::factory()
        ->hasContacts(2)
        ->create();

    $this->jiri = Jiri::factory()
        ->for($this->user)
        ->make()
        ->toArray();

    actingAs($this->user);
});


test('a user cannot create a jiri with another user\'s contacts', function () {
    $this->jiri['students'] = $this->otherUser->contacts->pluck('id')->toArray();
    post(route('jiris.store'), $this->jiri)
        ->assertInvalid([
            'students'
        ]);
});

test('a user can create a jiri with his own contacts', function () {
    $this->jiri['students'] = $this->user->contacts->pluck('id')->toArray();

    post(route('jiris.store'), $this->jiri)
        ->assertValid([
            'students'
        ]);
});
