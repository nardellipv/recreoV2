<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use Rap2hpoutre\FastExcel\SheetCollection;

class StudentAdminController extends Controller
{
    public function adminListStudent()
    {
        $students = Student::with(['user'])
            ->get();

        return view('admin.student.listStudentAdmin', compact('students'));
    }

    public function adminEditStudent($id)
    {
        $student = Student::find($id);

        return view('admin.student.editStudent', compact('student'));
    }

    public function adminUpdateStudent(Request $request, $id)
    {
        $student = Student::find($id);

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

    public function exportStudentLevel1()
    {
        // Nivel 1
        $studentCABA = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 2)
            ->where('level_student', 1)
            ->get();

        $studentBA = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 6)
            ->where('level_student', 1)
            ->get();
        $studentCatamarca = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 10)
            ->where('level_student', 1)
            ->get();
        $studentCba = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 14)
            ->where('level_student', 1)
            ->get();
        $studentCorriente = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 18)
            ->where('level_student', 1)
            ->get();
        $studentChaco = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 22)
            ->where('level_student', 1)
            ->get();
        $studentChubut = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 26)
            ->where('level_student', 1)
            ->get();
        $studentERios = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 30)
            ->where('level_student', 1)
            ->get();
        $studentFormosa = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 34)
            ->where('level_student', 1)
            ->get();
        $studentJujuy = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 38)
            ->where('level_student', 1)
            ->get();
        $studentLaPampa = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 42)
            ->where('level_student', 1)
            ->get();
        $studentLaRioja = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 46)
            ->where('level_student', 1)
            ->get();
        $studentMza = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 50)
            ->where('level_student', 1)
            ->get();
        $studentMisiones = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 54)
            ->where('level_student', 1)
            ->get();
        $studentNqn = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 58)
            ->where('level_student', 1)
            ->get();
        $studentRNegro = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 62)
            ->where('level_student', 1)
            ->get();
        $studentSalta = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 66)
            ->where('level_student', 1)
            ->get();
        $studentSJuan = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 70)
            ->where('level_student', 1)
            ->get();
        $studentSLuis = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 74)
            ->where('level_student', 1)
            ->get();
        $studentSCruz = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 78)
            ->where('level_student', 1)
            ->get();
        $studentStaFe = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 82)
            ->where('level_student', 1)
            ->get();
        $studentSDEstero = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 86)
            ->where('level_student', 1)
            ->get();
        $studentTucuman = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 90)
            ->where('level_student', 1)
            ->get();
        $studentTFuego = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 94)
            ->where('level_student', 1)
            ->get();

        $level1 = new SheetCollection([
            "Buenos Aires" => $studentBA,
            "CABA" => $studentCABA,
            "Catamarca" => $studentCatamarca,
            "Córdoba" => $studentCba,
            "Corrientes" => $studentCorriente,
            "Chaco" => $studentChaco,
            "Chubut" => $studentChubut,
            "Entre Ríos" => $studentERios,
            "Formosa" => $studentFormosa,
            "Jujuy" => $studentJujuy,
            "La Pampa" => $studentLaPampa,
            "La Rioja" => $studentLaRioja,
            "Mendoza" => $studentMza,
            "Misiones" => $studentMisiones,
            "Neuquén" => $studentNqn,
            "Río Negro" => $studentRNegro,
            "Salta" => $studentSalta,
            "San Juan" => $studentSJuan,
            "San Luis" => $studentSLuis,
            "Santa Cruz" => $studentSCruz,
            "Santa Fe" => $studentStaFe,
            "Santiago del Estero" => $studentSDEstero,
            "Tucumán" => $studentTucuman,
            "Tierra del Fuego" => $studentTFuego,
        ]);

        // return (fastexcel($level1))->download("Estudiantes por Provincia Nivel 1.xlsx");
        return (fastexcel($level1))->download("Estudiantes por Provincia Nivel 1.xlsx", function ($user) {
            return [
                'Nombre' => ucfirst($user->name_student),
                'Apellido' => ucfirst($user->lastname_student),
                'DNI' => ucfirst($user->dni_student),
                'Cumpleñaos' => ucfirst($user->birth_date),
                'Genero' => ucfirst($user->genre),
                'Teléfono' => ucfirst($user->phone_student),
                'email' => lcfirst($user->email_student),
                'Grado' => ucfirst($user->classroom),
                'Nivel' => ucfirst($user->level_student),
                'Primera Nota' => ucfirst($user->first_note),
                'Segunda Nota' => ucfirst($user->second_note),
                'Nota Total' => ucfirst($user->total_note),
                '¿Primera Vez?' => ucfirst($user->first_time_student),
                'Nombre Escuela' => ucfirst($user->name_school),
                'Dirección Escuela' => ucfirst($user->address),
            ];
        });
    }

    public function exportStudentLevel2()
    {
        // Nivel 2
        $studentCABA = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 2)
            ->where('level_student', 2)
            ->get();
        $studentBA = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 6)
            ->where('level_student', 2)
            ->get();
        $studentCatamarca = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 10)
            ->where('level_student', 2)
            ->get();
        $studentCba = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 14)
            ->where('level_student', 2)
            ->get();
        $studentCorriente = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 18)
            ->where('level_student', 2)
            ->get();
        $studentChaco = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 22)
            ->where('level_student', 2)
            ->get();
        $studentChubut = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 26)
            ->where('level_student', 2)
            ->get();
        $studentERios = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 30)
            ->where('level_student', 2)
            ->get();
        $studentFormosa = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 34)
            ->where('level_student', 2)
            ->get();
        $studentJujuy = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 38)
            ->where('level_student', 2)
            ->get();
        $studentLaPampa = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 42)
            ->where('level_student', 2)
            ->get();
        $studentLaRioja = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 46)
            ->where('level_student', 2)
            ->get();
        $studentMza = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 50)
            ->where('level_student', 2)
            ->get();
        $studentMisiones = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 54)
            ->where('level_student', 2)
            ->get();
        $studentNqn = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 58)
            ->where('level_student', 2)
            ->get();
        $studentRNegro = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 62)
            ->where('level_student', 2)
            ->get();
        $studentSalta = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 66)
            ->where('level_student', 2)
            ->get();
        $studentSJuan = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 70)
            ->where('level_student', 2)
            ->get();
        $studentSLuis = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 74)
            ->where('level_student', 2)
            ->get();
        $studentSCruz = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 78)
            ->where('level_student', 2)
            ->get();
        $studentStaFe = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 82)
            ->where('level_student', 2)
            ->get();
        $studentSDEstero = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 86)
            ->where('level_student', 2)
            ->get();
        $studentTucuman = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 90)
            ->where('level_student', 2)
            ->get();
        $studentTFuego = Student::join('users', 'students.user_id', 'users.id')
            ->where('users.province_id', 94)
            ->where('level_student', 2)
            ->get();

        $level2 = new SheetCollection([
            "Buenos Aires" => $studentBA,
            "CABA" => $studentCABA,
            "Catamarca" => $studentCatamarca,
            "Córdoba" => $studentCba,
            "Corrientes" => $studentCorriente,
            "Chaco" => $studentChaco,
            "Chubut" => $studentChubut,
            "Entre Ríos" => $studentERios,
            "Formosa" => $studentFormosa,
            "Jujuy" => $studentJujuy,
            "La Pampa" => $studentLaPampa,
            "La Rioja" => $studentLaRioja,
            "Mendoza" => $studentMza,
            "Misiones" => $studentMisiones,
            "Neuquén" => $studentNqn,
            "Río Negro" => $studentRNegro,
            "Salta" => $studentSalta,
            "San Juan" => $studentSJuan,
            "San Luis" => $studentSLuis,
            "Santa Cruz" => $studentSCruz,
            "Santa Fe" => $studentStaFe,
            "Santiago del Estero" => $studentSDEstero,
            "Tucumán" => $studentTucuman,
            "Tierra del Fuego" => $studentTFuego,
        ]);

        // Exportation des feuilles de calcul vers "/public/users-posts-products.xlsx"
        return (fastexcel($level2))->download("Estudiantes por Provincia Nivel 2.xlsx", function ($user) {
            return [
                'Nombre' => ucfirst($user->name_student),
                'Apellido' => ucfirst($user->lastname_student),
                'DNI' => ucfirst($user->dni_student),
                'Cumpleñaos' => ucfirst($user->birth_date),
                'Genero' => ucfirst($user->genre),
                'Teléfono' => ucfirst($user->phone_student),
                'email' => lcfirst($user->email_student),
                'Grado' => ucfirst($user->classroom),
                'Nivel' => ucfirst($user->level_student),
                'Primera Nota' => ucfirst($user->first_note),
                'Segunda Nota' => ucfirst($user->second_note),
                'Nota Total' => ucfirst($user->total_note),
                '¿Primera Vez?' => ucfirst($user->first_time_student),
                'Nombre Escuela' => ucfirst($user->name_school),
                'Dirección Escuela' => ucfirst($user->address),
            ];
        });
    }
}
