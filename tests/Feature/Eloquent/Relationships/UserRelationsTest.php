<?php


use App\Models\User;

test('a user can have many jiris', function () {
    $user = User::factory()->hasJiris(3)->create();

    expect($user->jiris)->toHaveCount(3);
});

test('a user can have no jiris', function () {
    $user = User::factory()->create();

    expect($user->jiris)->toBeEmpty();
});
