<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    private static array $originals;

    private function getPhotoPath(): string
    {
        if (! isset(self::$originals)) {
            self::$originals = Storage::disk('public')->files('contacts/seed/original');
        }

        return self::$originals[array_rand(self::$originals)];
    }

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'photo' => $this->getPhotoPath(),
        ];
    }
}
