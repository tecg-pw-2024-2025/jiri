<?php

namespace App\Models;

use App\Enums\ContactRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
            ->belongsToMany(Contact::class, Attendance::class)
            ->withPivotValue('role', ContactRoles::Student->value)
            ->withTimestamps();
    }

    public function evaluators(): BelongsToMany
    {
        return $this
            ->belongsToMany(Contact::class, Attendance::class)
            ->withPivotValue('role', ContactRoles::Evaluator->value)
            ->withTimestamps();
    }
}
