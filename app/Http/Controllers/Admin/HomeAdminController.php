<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index()
    {
        $countStudentLevel1 = Student::where('level', 1)
            ->count();

        $countStudentLevel2 = Student::where('level', 2)
            ->count();

        $countTeacher = Teacher::count();

        $countSchool = User::count();

        return view('admin.index', compact(
            'countSchool',
            'countTeacher',
            'countStudentLevel1',
            'countStudentLevel2'
        ));
    }
}
