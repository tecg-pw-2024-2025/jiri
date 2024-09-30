<?php

use App\Models\Jiri;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\patch;
use function Pest\Laravel\delete;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

// The GET routes
it('has a route to display jiris', function () {
    $response = get(route('jiris.index'));

    $response->assertStatus(200);
});

it('has a route to display one jiri', function () {
    $jiri = Jiri::factory()->create();

    $response = get(route('jiris.show', $jiri));

    $response->assertStatus(200);
});

it('has a route to display a creation form for a jiri', function () {
    $response = get(route('jiris.create'));

    $response->assertStatus(200);
});

it('has a route to display an edit form for a jiri', function () {
    $jiri = Jiri::factory()->create();

    $response = get(route('jiris.create', $jiri));

    $response->assertStatus(200);
});

// The routes changing the database
it('has a route to store a jiri', function () {
    $jiri = Jiri::factory()->make()->toArray();

    $response = post(route('jiris.store'), $jiri);

    $response->assertStatus(302);
    assertDatabaseHas('jiris', $jiri);
});

it('has a route to update a jiri', function () {
    $jiri = Jiri::factory()->create();

    $jiri->name = 'Updated name';

    $response = patch(route('jiris.update', $jiri), $jiri->toArray());

    $response->assertStatus(302);
    assertDatabaseHas('jiris', $jiri->toArray());
});

it('has a route to delete a jiri', function () {
    $jiri = Jiri::factory()->create();

    $response = delete(route('jiris.destroy', $jiri));

    $response->assertStatus(302);
    assertDatabaseMissing('jiris', $jiri->toArray());
});
