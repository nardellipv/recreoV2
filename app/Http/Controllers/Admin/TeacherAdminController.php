<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Teacher;

class TeacherAdminController extends Controller
{
    public function adminListTeacher()
    {
        $teachers = Teacher::all();

        return view('admin.teacher.listTeacherAdmin', compact('teachers'));
    }
}
