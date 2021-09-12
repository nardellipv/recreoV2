<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $students = Student::where('user_id', current_user()->id)
            ->get();
// dd($students);
        $teachers = Teacher::where('user_id', current_user()->id)
            ->get();

        return view('web.index', compact('students', 'teachers'));
    }
}
