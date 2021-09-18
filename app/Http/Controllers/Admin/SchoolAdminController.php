<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class SchoolAdminController extends Controller
{
    public function adminListSchool()
    {
        $schools = User::all();

        return view('admin.school.listSchoolAdmin', compact('schools'));
    }
}
