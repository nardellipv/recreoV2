<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Http\Requests\UserRequest;
use App\Province;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $students = Student::where('user_id', current_user()->id)
            ->get();

        $teachers = Teacher::where('user_id', current_user()->id)
            ->get();

        $school = User::where('id', current_user()->id)
            ->first();

        return view('web.index', compact('students', 'teachers', 'school'));
    }
}
