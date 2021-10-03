<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\SheetCollection;

class TeacherAdminController extends Controller
{
    public function adminListTeacher()
    {
        $teachers = Teacher::all();

        return view('admin.teacher.listTeacherAdmin', compact('teachers'));
    }

    public function adminEditTeacher($id)
    {
        $teacher = Teacher::find($id);

        return view('admin.teacher.editTeacher', compact('teacher'));
    }

    public function adminUpdateTeacher(Request $request, $id)
    {
        $teacher = Teacher::find($id);

        // $this->authorize('updateTeacher', $teacher);

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

    public function exportTeacherSchoolLevel()
    {
        $teacherSchoolLevel1 = Teacher::join('users', 'teachers.user_id', 'users.id')
            ->where('teachers.level_teacher', 1)
            ->get();

        $teacherSchoolLevel2 = Teacher::join('users', 'teachers.user_id', 'users.id')
            ->where('level_teacher', 2)
            ->get();

        $teacherSchoolLevel3 = Teacher::join('users', 'teachers.user_id', 'users.id')
            ->where('level_teacher', 3)
            ->get();

        $teacherSchoolLevel = new SheetCollection([
            "Nivel 1" => $teacherSchoolLevel1,
            "Nivel 2" => $teacherSchoolLevel2,
            "Ambos Niveles" => $teacherSchoolLevel3,
        ]);

        // return (fastexcel($level1))->download("Estudiantes por Provincia Nivel 1.xlsx");
        return (fastexcel($teacherSchoolLevel))->download("Profesores por Escuela y Nivel.xlsx", function ($user) {
            return [
                'Nombre' => ucfirst($user->name_teacher),
                'Apellido' => ucfirst($user->lastname_teacher),
                'DNI' => ucfirst($user->dni_teacher),
                'Teléfono' => ucfirst($user->phone_teacher),
                'email' => lcfirst($user->email_teacher),
                'Espacio' => ucfirst($user->space),
                'Nivel' => ucfirst($user->level_teacher),
                '¿Primera Vez?' => ucfirst($user->first_time_teacher),
                '¿Otro Colegio?' => ucfirst($user->other_school),
                'Nombre Otro Colegio' => ucfirst($user->name_school_teacher),
                'Escuela' => ucfirst($user->name_school),
                'Dirección Escuela' => ucfirst($user->address),
            ];
        });
    }

    public function exportTeacherStudent()
    {
        $teacherStudent1 = Teacher::join('users', 'teachers.user_id', 'users.id')
            ->join('students', 'teachers.user_id', 'students.user_id')
            ->where('teachers.level_teacher','1')
            ->get();

        $teacherStudent2 = Teacher::join('users', 'teachers.user_id', 'users.id')
            ->join('students', 'teachers.user_id', 'students.user_id')
            ->where('teachers.level_teacher','2')
            ->get();

        $teacherStudent3 = Teacher::join('users', 'teachers.user_id', 'users.id')
            ->join('students', 'teachers.user_id', 'students.user_id')
            ->where('teachers.level_teacher','3')
            ->get();

        $teacherStudent = new SheetCollection([
            "Nivel 1" => $teacherStudent1,
            "Nivel 2" => $teacherStudent2,
            "Ambos Niveles" => $teacherStudent3,
        ]);

        return (fastexcel($teacherStudent))->download("Profesores-Estudiantes.xlsx", function ($user) {
            return [
                'Nombre Profesor' => ucfirst($user->name_teacher),
                'Apellido Profesor' => ucfirst($user->lastname_teacher),
                'Teléfono Profesor' => ucfirst($user->phone_teacher),
                'email Profesor' => lcfirst($user->email_teacher),
                'Espacio' => ucfirst($user->space),
                'Nivel' => ucfirst($user->level_teacher),
                'Escuela' => ucfirst($user->name_school),
                'Dirección Escuela' => ucfirst($user->address),
                'Nombre Alumno' => ucfirst($user->name_student),
                'Apellido Alumno' => ucfirst($user->lastname_student),
                'Email Alumno' => ucfirst($user->email_student),
            ];
        });
    }
}
