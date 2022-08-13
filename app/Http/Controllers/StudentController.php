<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteInterStudentRequest;
use App\Http\Requests\NoteStudentRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudentRequest;
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

    public function updateStudent(UpdateStudentRequest $request, $id)
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

    public function addNoteStudent(NoteStudentRequest $request, $id)
    {
        $student = Student::find($id);

        $this->authorize('updateStudent', $student);

        $student->first_note = $request['first_note'];
        $student->second_note = $request['second_note'];
        $student->total_note = $student->first_note + $student->second_note;
        $student->save();

        toast('Nota agregada correctamente!', 'success');
        return back();
    }

    public function addNoteInterStudent(NoteInterStudentRequest $request, $id)
    {
        $student = Student::find($id);

        $this->authorize('updateStudent', $student);

        $student->first_note_inter = $request['first_note_inter'];
        $student->second_note_inter = $request['second_note_inter'];
        $student->total_note_inter = $student->first_note_inter + $student->second_note_inter;
        $student->save();

        toast('Nota agregada correctamente!', 'success');
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
