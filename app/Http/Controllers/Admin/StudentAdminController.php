<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class StudentAdminController extends Controller
{
    public function adminListStudent()
    {
        $students = Student::all();

        return view('admin.student.listStudentAdmin', compact('students'));
    }
}
