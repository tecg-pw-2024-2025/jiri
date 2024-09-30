<?php

use App\Models\User;

test('a jiri belongs to a user', function () {
    $user = User::factory()->create();
    $jiri = $user->jiris()->create([
        'name' => 'Jiri name',
        'starting_at' => now(),
    ]);

    expect($jiri->user->id)->toBe($user->id);
});
