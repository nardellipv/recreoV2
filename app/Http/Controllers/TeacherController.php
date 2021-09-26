<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Teacher;


class TeacherController extends Controller
{
    public function listTeacher()
    {
        $teachers = Teacher::where('user_id', current_user()->id)
            ->get();

        return view('web.teachers.listTeacher', compact('teachers'));
    }

    public function storeTeacher(TeacherRequest $request)
    {
        Teacher::create([
            'name_teacher' => $request['name_teacher'],
            'lastname_teacher' => $request['lastname_teacher'],
            'phone_teacher' => $request['phone_teacher'],
            'dni_teacher' => $request['dni_teacher'],
            'email_teacher' => $request['email_teacher'],
            'space' => $request['space'],
            'level_teacher' => $request['level_teacher'],
            'first_time_teacher' => $request['first_time_teacher'],
            'other_school' => $request['other_school'],
            'name_school_teacher' => $request['name_school_teacher'],
            'user_id' => current_user()->id,
        ]);

        toast('Profesor agregado correctamente!', 'success');
        return back();
    }

    public function editTeacher($id)
    {
        $teacher = Teacher::find($id);

        return view('web.teachers.editTeacher', compact('teacher'));
    }

    public function updateTeacher(UpdateTeacherRequest $request, $id)
    {
        $teacher = Teacher::find($id);

        $this->authorize('updateTeacher', $teacher);

        $teacher->name_teacher = $request['name_teacher'];
        $teacher->lastname_teacher = $request['lastname_teacher'];
        $teacher->dni_teacher = $request['dni_teacher'];
        $teacher->space = $request['space'];
        $teacher->level_teacher = $request['level_teacher'];
        $teacher->other_school = $request['other_school'];
        $teacher->name_school_teacher = $request['name_school_teacher'];
        $teacher->phone_teacher = $request['phone_teacher'];
        $teacher->email_teacher = $request['email_teacher'];
        $teacher->first_time_teacher = $request['first_time_teacher'];
        $teacher->save();

        toast('Profesor modificado correctamente!', 'success');
        return back();
    }

    public function deleteTeacher($id)
    {
        $teacher = Teacher::find($id);

        $this->authorize('updateTeacher', $teacher);
        
        $teacher->delete();

        toast('Profesor eliminado correctamente!', 'success');
        return back();
    }
}
