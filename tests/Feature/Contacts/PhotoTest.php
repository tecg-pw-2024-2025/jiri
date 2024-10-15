<?php

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\UploadedFile;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

beforeEach(function () {
    Storage::fake('public');
    $this->user = User::factory()->create();
    $this->contact = Contact::factory()
        ->for($this->user)
        ->create();
    actingAs($this->user);
});

test('a contact has a photo property', function () {
    expect($this->contact->photo)->toBeNull();
});

test('a contact can have a photo', function () {
    $this->contact->photo = 'photo.jpg';
    $this->contact->save();

    expect($this->contact->photo)->toBe('photo.jpg');
});

test('a contact can have a photo removed', function () {
    $this->contact->photo = 'photo.jpg';
    $this->contact->save();

    $this->contact->photo = null;
    $this->contact->save();

    expect($this->contact->photo)->toBeNull();
});

test('a contact photo can be stored on the disk', function () {
    $contact = Contact::factory()
        ->for($this->user)
        ->make()
        ->toArray();

    $response = post(
        route('contacts.store'),
        [
            ...$contact,
            'photo' => UploadedFile::fake()->image('photo.jpg'),
        ]
    );
    $response->assertSessionHasNoErrors();

    $contact = Contact::latest('id')->first();

    expect(
        Storage::disk('images')
            ->exists($contact->photo)
    )->toBeTrue();
});

test('an uploaded photo is resized to several variants', function () {
    $contact = Contact::factory()
        ->for($this->user)
        ->make()
        ->toArray();

    $response = post(
        route('contacts.store'),
        [
            ...$contact,
            'photo' => UploadedFile::fake()->image('photo.jpg'),
        ]
    );

    $contact = Contact::latest('id')->first();

    foreach (Config::get('photos.sizes') as $name => $size) {
        if (! is_int($size)) {
            continue;
        }
        expect(
            Storage::disk('images')
                ->exists(str_replace('original', $name, $contact->photo))
        )->toBeTrue();
    }
});
