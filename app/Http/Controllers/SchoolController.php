<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\User;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function editSchool($id)
    {
        $school = User::find($id);

        return view('web.school.editSchool', compact('school'));
    }

    public function updateSchool(SchoolRequest $request, $id)
    {
        $school = User::find($id);

        $school->name_school = $request['name_school'];
        $school->phone_school = $request['phone_school'];
        $school->address = $request['address'];
        $school->postal_code = $request['postal_code'];
        $school->email_school = $request['email_school'];
        $school->director1 = $request['director1'];
        $school->director2 = $request['director2'];
        $school->type = $request['type'];
        $school->sede = $request['sede'];
        $school->first_time_school = $request['first_time_school'];
        $school->save();


        toast('El colegio fue modificado correctamente!', 'success');
        return back();
    }
}
