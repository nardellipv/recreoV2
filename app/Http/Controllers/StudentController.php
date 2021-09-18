<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Student;

class StudentController extends Controller
{
    public function listStudent()
    {
        $students = Student::where('user_id', current_user()->id)
            ->get();

        return view('web.students.listStudent', compact('students'));
    }

    public function storeStudent(StudentRequest $request)
    {
        Student::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'phone' => $request['phone'],
            'dni' => $request['dni'],
            'birth_date' => $request['birth_date'],
            'email' => $request['email'],
            'level' => $request['level'],
            'classroom' => $request['classroom'],
            'first_time' => $request['first_time'],
            'genre' => $request['genre'],
            'user_id' => current_user()->id,
        ]);

        toast('Alumno agregado correctamente!', 'success');
        return back();
    }

    public function editStudent($id)
    {
        $student = Student::find($id);

        return view('web.students.editStudent', compact('student'));
    }

    public function updateStudent(StudentRequest $request, $id)
    {
        $student = Student::find($id);

        $this->authorize('updateStudent', $student);

        $student->name = $request['name'];
        $student->lastname = $request['lastname'];
        $student->dni = $request['dni'];
        $student->phone = $request['phone'];
        $student->birth_date = $request['birth_date'];
        $student->email = $request['email'];
        $student->level = $request['level'];
        $student->classroom = $request['classroom'];
        $student->first_time = $request['first_time'];
        $student->genre = $request['genre'];
        $student->save();

        toast('Estudiante modificado correctamente!', 'success');
        return back();
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);

        $this->authorize('updateStudent', $student);
        
        $student->delete();

        toast('Estudiante eliminado correctamente!', 'success');
        return back();
    }

}
