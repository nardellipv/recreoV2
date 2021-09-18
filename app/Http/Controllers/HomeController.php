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

    public function editSchool($id)
    {
        $school = User::find($id);

        return view('web.school.editSchool', compact('school'));
    }

    public function updateSchool(SchoolRequest $request, $id)
    {
        $school = User::find($id);

        $school->name = $request['name'];
        $school->phone = $request['phone'];
        $school->address = $request['address'];
        $school->postal_code = $request['postal_code'];
        $school->email = $request['email'];
        $school->director1 = $request['director1'];
        $school->director2 = $request['director2'];
        $school->type = $request['type'];
        $school->sede = $request['sede'];
        $school->first_time = $request['first_time'];
        $school->save();


        toast('El colegio fue modificado correctamente!', 'success');
        return back();
    }
}
