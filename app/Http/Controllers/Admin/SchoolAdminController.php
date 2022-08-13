<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\SheetCollection;
use Rap2hpoutre\FastExcel\FastExcel;

class SchoolAdminController extends Controller
{
    public function adminListSchool()
    {
        $schools = User::with(['province', 'region'])
        ->get();

        return view('admin.school.listSchoolAdmin', compact('schools'));
    }

    public function adminEditSchool($id)
    {
        $school = User::find($id);

        return view('admin.school.editSchool', compact('school'));
    }

    public function adminUpdateSchool(Request $request, $id)
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
        
        if($request->password){
            $school->password = bcrypt($request['password']);
        }
        $school->save();

        toast('El colegio fue modificado correctamente!', 'success');
        return back();
    }

    public function exportSchoolLevelStudent()
    {

        $schoolLevel1Student = User::join('students', 'users.id', 'students.user_id')
            ->where('level_student', 1)
            ->get();

        $schoolLevel2Student = User::join('students', 'users.id', 'students.user_id')
            ->where('level_student', 2)
            ->get();

        $schoolLevelStudent = new SheetCollection([
            "Nivel 1" => $schoolLevel1Student,
            "Nivel 2" => $schoolLevel2Student,
        ]);

        // return (fastexcel($level1))->download("Estudiantes por Provincia Nivel 1.xlsx");
        return (fastexcel($schoolLevelStudent))->download("colegios x nivel.xlsx", function ($user) {
            return [
                'Nombre' => ucfirst($user->name_school),
                'Dirección' => ucfirst($user->address),
                'Código Postal' => ucfirst($user->postal_code),
                'Teléfono' => ucfirst($user->phone_school),
                'email' => lcfirst($user->email_school),
                'Tipo' => ucfirst($user->type),
                'Director' => ucfirst($user->director1),
                'Vice Director' => ucfirst($user->director2),
                '¿Es Sede?' => ucfirst($user->sede),
                'Primera Vez?' => ucfirst($user->first_time_school),
                'Provincia' => ucfirst($user->province->name),
                'Localidad' => ucfirst($user->region->name),
            ];
        });
    }

    public function adminEditDownload(Request $request, $id)
    {
        $school = User::find($id);
        $school->download = $request->download;
        $school->download_enter = $request->download_enter;
        $school->download_level = $request->download_level;
        $school->save();

        return back();
    }
}
