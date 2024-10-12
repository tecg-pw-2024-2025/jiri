<?php

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\post;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = post(route('register'), [
        'email' => 'test@example.com',
        'password' => 'password1!',
    ]);

    assertAuthenticated();

    $response->assertRedirect(route('jiris.index', absolute: false));
});
