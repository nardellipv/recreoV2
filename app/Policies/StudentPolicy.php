<?php

namespace App\Policies;

use App\Student;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
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

    public function updateStudent(User $user, Student $student)
    {
        return $user->id === $student->user_id OR $user->userType === 'Admin';
    }
}
