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
            'name_student' => $request['name_student'],
            'lastname_student' => $request['lastname_student'],
            'phone_student' => $request['phone_student'],
            'dni_student' => $request['dni_student'],
            'birth_date' => $request['birth_date'],
            'email_student' => $request['email_student'],
            'level_student' => $request['level_student'],
            'classroom' => $request['classroom'],
            'first_time_student' => $request['first_time_student'],
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

        $student->name_student = $request['name_student'];
        $student->lastname_student = $request['lastname_student'];
        $student->dni_student = $request['dni_student'];
        $student->phone_student = $request['phone_student'];
        $student->birth_date = $request['birth_date'];
        $student->email_student = $request['email_student'];
        $student->level_student = $request['level_student'];
        $student->classroom = $request['classroom'];
        $student->first_time_student = $request['first_time_student'];
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
