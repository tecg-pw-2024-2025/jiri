<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->user = User::factory()->create();

    $this->jiri = $this->user->jiris()->create([
        'name' => 'Jiri name',
        'starting_at' => now(),
    ]);

    $this->contacts = $this->user->contacts()->createMany([
        [
            'first_name' => 'Stacy',
            'last_name' => 'Roob',
            'email' => 'carmelo.jerde@hotmail.com',
            'user_id' => $this->user->id
        ],
        [
            'first_name' => 'Claude',
            'last_name' => 'Katz',
            'email' => 'jarrod.mayert@hotmail.com',
            'user_id' => $this->user->id
        ],
    ]);
    actingAs($this->user);
});

test('a jiri belongs to a user', function () {
    expect($this->jiri->user->id)->toBe($this->user->id);
});

test('a jiri has students', function () {
    $this->jiri->students()->attach($this->contacts);

    expect($this->jiri->students->count())->toBe(2)
        ->and($this->jiri->students->first()->fullname)->toBe('Stacy Roob')
        ->and($this->jiri->students->last()->fullname)->toBe('Claude Katz');
});

test('a jiri has evaluators', function () {
    $this->jiri->evaluators()->attach($this->contacts);

    expect($this->jiri->evaluators->count())->toBe(2)
        ->and($this->jiri->evaluators->first()->fullname)->toBe('Stacy Roob')
        ->and($this->jiri->evaluators->last()->fullname)->toBe('Claude Katz');
});
