<?php

use App\Models\Jiri;
use App\Models\User;

use function Pest\Laravel\{assertDatabaseHas, assertDatabaseMissing, delete, get, patch, post};

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->otherUser = User::factory()->create();
    $this->actingAs($this->user);
});

// The GET routes
// Index

// Show
test('a user can view a jiri he created', function () {
    $jiri = $this->user->jiris()->save(Jiri::factory()->make());

    get(route('jiris.show', $jiri))
        ->assertOk();
});

test('a user cannot view a jiri he did not create', function () {
    $jiri = $this->otherUser->jiris()->save(Jiri::factory()->make());

    get(route('jiris.show', $jiri))
        ->assertForbidden();
});

// The routes changing the database
// Store
test('a user can store a jiri', function () {
    $jiri = Jiri::factory()->make();

    post(route('jiris.store'), $jiri->toArray())
        ->assertRedirect(route('jiris.show', Jiri::first()));

    assertDatabaseHas('jiris', $jiri->toArray());
});

// Update
test('a user can update a jiri he created', function () {
    $jiri = $this->user->jiris()->save(Jiri::factory()->make());

    $updatedJiriValues = Jiri::factory()->make();

    patch(route('jiris.update', $jiri), $updatedJiriValues->toArray())
        ->assertRedirect(route('jiris.show', $jiri));

    assertDatabaseHas('jiris', $updatedJiriValues->toArray());
    assertDatabaseMissing('jiris', $jiri->toArray());
});

test('a user cannot update a jiri he did not create', function () {
    $jiri = $this->otherUser->jiris()->save(Jiri::factory()->make());

    $updatedJiriValues = Jiri::factory()->make();

    patch(route('jiris.update', $jiri), $updatedJiriValues->toArray())
        ->assertForbidden();

    assertDatabaseMissing('jiris', $updatedJiriValues->toArray());
    assertDatabaseHas('jiris', $jiri->toArray());
});

// Destroy
test('a user can delete a jiri he created', function () {
    $jiri = $this->user->jiris()->save(Jiri::factory()->make());

    delete(route('jiris.destroy', $jiri))
        ->assertRedirect(route('jiris.index'));

    assertDatabaseMissing('jiris', $jiri->toArray());
});

test('a user cannot delete a jiri he did not create', function () {
    $jiri = $this->otherUser->jiris()->save(Jiri::factory()->make());

    delete(route('jiris.destroy', $jiri))
        ->assertForbidden();

    assertDatabaseHas('jiris', $jiri->toArray());
});

