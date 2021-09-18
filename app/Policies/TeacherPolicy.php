<?php

namespace App\Policies;

use App\Teacher;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function updateTeacher(User $user, Teacher $teacher)
    {
        return $user->id === $teacher->user_id OR $user->userType === 'Admin';
    }
}
