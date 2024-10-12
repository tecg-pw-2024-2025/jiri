<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\ContactRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function jiris(): HasMany
    {
        return $this
            ->hasMany(Jiri::class);
    }

    public function pastJiris(): HasMany
    {
        return $this
            ->hasMany(Jiri::class)
            ->where('starting_at', '<', now())
            ->orderBy('starting_at', 'desc');
    }

    public function upcomingJiris(): HasMany
    {
        return $this
            ->hasMany(Jiri::class)
            ->where('starting_at', '>=', now())
            ->orderBy('starting_at');
    }

    public function contacts(): HasMany
    {
        return $this
            ->hasMany(Contact::class);
    }

    public function student_attendances(): HasManyThrough
    {
        return $this
            ->attendances()
            ->where('role', ContactRoles::Student->value);
    }

    public function attendances(): HasManyThrough
    {
        return $this
            ->hasManyThrough(Attendance::class, Jiri::class);
    }

    public function evaluator_attendances(): HasManyThrough
    {
        return $this
            ->attendances()
            ->where('role', ContactRoles::Evaluator->value);
    }

    public function projects(): HasMany
    {
        return $this
            ->hasMany(Project::class);
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value, array $attributes) => $attributes['first_name'].' '.$attributes['last_name'],
            // The following setter is not used in this project, but it is included for demonstration purposes.
            set: fn (string $value) => [
                'first_name' => explode(' ', $value)[0],
                'last_name' => explode(' ', $value)[1],
            ]
        )->shouldCache();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
