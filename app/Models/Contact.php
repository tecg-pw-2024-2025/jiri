<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['first_name'].' '.$attributes['last_name'],
            // The following setter is not used in this project, but it is included for demonstration purposes.
            set: fn(string $value) => [
                'first_name' => explode(' ', $value)[0],
                'last_name' => explode(' ', $value)[1]
            ]
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jiris(): BelongsToMany
    {
        return $this->belongsToMany(Jiri::class)
            ->using(Attendance::class)
            ->withPivot('role');
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
