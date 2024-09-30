<?php

use App\Models\User;

use function Pest\Laravel\post;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('validates the required fields on a jiri creation', function () {
        post(route('jiris.store'), [])->assertSessionHasErrors(['name', 'starting_at']);
});

it('validates the starting_at field as a date on a jiri creation', function () {
    $response = post(route('jiris.store'), ['starting_at' => 'not a date', 'name' => 'A name']);

    $response->assertSessionHasErrors(['starting_at']);
});

it('validates the size of the name field on a jiri creation', function () {
    // Size must be between 3 and 255
    $starting_at = now();

    $response = post(route('jiris.store'), ['name' => str_repeat('a', 2), 'starting_at' => $starting_at]);

    $response->assertSessionHasErrors(['name']);

    $response = post(route('jiris.store'), ['name' => str_repeat('a', 256), 'starting_at' => $starting_at]);

    $response->assertSessionHasErrors(['name']);

    $response = post(route('jiris.store'), ['name' => str_repeat('a', 3), 'starting_at' => $starting_at]);

    $response->assertSessionHasNoErrors();

    $response = post(route('jiris.store'), ['name' => str_repeat('a', 255), 'starting_at' => $starting_at]);

    $response->assertSessionHasNoErrors();
});
