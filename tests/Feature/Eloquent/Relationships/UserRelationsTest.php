<?php


use App\Models\User;

use function PHPUnit\Framework\assertCount;

test('a user can have many jiris', function () {
    $user = User::factory()->hasJiris(3)->create();

    assertCount(3, $user->jiris);
});
