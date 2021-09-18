<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
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
        // dd($request['name']);
        Teacher::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'phone' => $request['phone'],
            'dni' => $request['dni'],
            'email' => $request['email'],
            'space' => $request['space'],
            'level' => $request['level'],
            'first_time' => $request['first_time'],
            'other_school' => $request['other_school'],
            'name_school' => $request['name_school'],
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

    public function updateTeacher(TeacherRequest $request, $id)
    {
        $teacher = Teacher::find($id);

        $this->authorize('updateTeacher', $teacher);

        $teacher->name = $request['name'];
        $teacher->lastname = $request['lastname'];
        $teacher->dni = $request['dni'];
        $teacher->space = $request['space'];
        $teacher->level = $request['level'];
        $teacher->other_school = $request['other_school'];
        $teacher->name_school = $request['name_school'];
        $teacher->phone = $request['phone'];
        $teacher->email = $request['email'];
        $teacher->first_time = $request['first_time'];
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
