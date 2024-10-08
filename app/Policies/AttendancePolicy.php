<?php

namespace App\Policies;

use App\Models\Attendance;
use App\Models\User;

class AttendancePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Attendance $attendance): bool
    {
        return $user->id === $attendance->contact->user_id
            && $user->id === $attendance->jiri->user_id;
    }
}
