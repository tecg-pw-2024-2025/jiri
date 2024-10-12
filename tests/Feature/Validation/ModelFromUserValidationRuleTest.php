<?php

use App\Models\Jiri;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

beforeEach(function () {
    $this->user = User::factory()
        ->hasContacts(2)
        ->hasProjects(2)
        ->create();

    $this->otherUser = User::factory()
        ->hasContacts(2)
        ->hasProjects(2)
        ->create();

    $this->jiri = Jiri::factory()
        ->for($this->user)
        ->make()
        ->toArray();

    actingAs($this->user);
});

test('a user cannot create a jiri with students using another user\'s contacts', function () {
    $this->jiri['students'] = $this->otherUser->contacts->pluck('id')->toArray();

    post(route('jiris.store'), $this->jiri)
        ->assertInvalid([
            'students',
        ]);
});
test('a user cannot create a jiri with evaluators using another user\'s contacts', function () {
    $this->jiri['evaluators'] = $this->otherUser->contacts->pluck('id')->toArray();

    post(route('jiris.store'), $this->jiri)
        ->assertInvalid([
            'evaluators',
        ]);
});

test('a user cannot create a jiri with another user\'s projects', function () {
    $this->jiri['projects'] = $this->otherUser->projects->pluck('id')->toArray();

    post(route('jiris.store'), $this->jiri)
        ->assertInvalid([
            'projects',
        ]);
});

test('a user can create a jiri with students from his own contacts', function () {
    $this->jiri['students'] = $this->user->contacts->pluck('id')->toArray();

    post(route('jiris.store'), $this->jiri)
        ->assertValid([
            'students',
        ]);
});

test('a user can create a jiri with evaluators from his own contacts', function () {
    $this->jiri['evaluators'] = $this->user->contacts->pluck('id')->toArray();

    post(route('jiris.store'), $this->jiri)
        ->assertValid([
            'evaluators',
        ]);
});

test('a user can create a jiri with his own projects', function () {
    $this->jiri['projects'] = $this->user->projects->pluck('id')->toArray();

    post(route('jiris.store'), $this->jiri)
        ->assertValid([
            'projects',
        ]);
});
