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

test('a user cannot retrieve the jiris of another user', function () {
    User::factory()->hasJiris(3)->create();
    $anotherUser = User::factory()->create();

    expect($anotherUser->jiris)->toBeEmpty()
        ->and($anotherUser->pastJiris)->toBeEmpty()
        ->and($anotherUser->upcomingJiris)->toBeEmpty();
});
