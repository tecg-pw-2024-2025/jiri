<?php

namespace App\Models;

use App\Enums\ContactRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jiri extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'starting_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $fillable = [
        'name',
        'starting_at',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contacts(): BelongsToMany
    {
        return $this
            ->belongsToMany(Contact::class, Attendance::class)
            ->withTimestamps();
    }

    public function students(): BelongsToMany
    {
        return $this
            ->contacts()
            ->withPivot('id')
            ->withPivotValue('role', ContactRoles::Student->value)
            ->withTimestamps();
    }

    public function evaluators(): BelongsToMany
    {
        return $this
            ->contacts()
            ->withPivot('id')
            ->withPivotValue('role', ContactRoles::Evaluator->value)
            ->withTimestamps();
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, Assignment::class);
    }

    public function attendances(): HasMany
    {
        return $this->HasMany(Attendance::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

}
