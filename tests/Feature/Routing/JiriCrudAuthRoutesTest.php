<?php

use App\Models\Jiri;
use App\Models\User;

use function Pest\Laravel\{assertDatabaseHas, assertDatabaseMissing, delete, get, patch, post};

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

// The GET routes
// Index
it('has a route to display jiris to auth users', function () {
    get(route('jiris.index'))->assertStatus(200);
});

// Show
it('has a route to display one jiri to auth users', function () {
    $jiri = Jiri::factory()->create();

    get(route('jiris.show', $jiri))->assertStatus(200);
});

it('has a route to display a creation form for a jiri to auth users', function () {
    get(route('jiris.create'))->assertStatus(200);
});

it('has a route to display an edit form for a jiri to auth users', function () {
    $jiri = Jiri::factory()->create();

    get(route('jiris.create', $jiri))->assertStatus(200);
});

// The routes changing the database
it('has a route to store a jiri to auth users', function () {
    $jiri = Jiri::factory()->make()->toArray();

    post(route('jiris.store'), $jiri)->assertStatus(302);
    assertDatabaseHas('jiris', $jiri);
});

it('has a route to update a jiri to auth users', function () {
    $jiri = Jiri::factory()->create();

    $jiri->name = 'Updated name';

    patch(route('jiris.update', $jiri), $jiri->toArray())->assertStatus(302);
    assertDatabaseHas('jiris', $jiri->toArray());
});

it('has a route to delete a jiri to auth users', function () {
    $jiri = Jiri::factory()->create();

    delete(route('jiris.destroy', $jiri))->assertStatus(302);
    assertDatabaseMissing('jiris', $jiri->toArray());
});
