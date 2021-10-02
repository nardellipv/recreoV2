<?php

namespace App\Http\Controllers\Admin;

use App\Buttons;
use App\Http\Controllers\Controller;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index()
    {
        $countStudentLevel1 = Student::where('level_student', 1)
            ->count();

        $statusButton = Buttons::get();

        $countStudentLevel2 = Student::where('level_student', 2)
            ->count();

        $countTeacher = Teacher::count();

        $countSchool = User::count();

        return view('admin.index', compact(
            'countSchool',
            'countTeacher',
            'countStudentLevel1',
            'countStudentLevel2',
            'statusButton'
        ));
    }

    public function editStatus(Request $request, $id)
    {
        $status = Buttons::find($id);
        $status->status_button = $request['status_button'];
        $status->first_note_max = $request['first_note_max'];
        $status->second_note_max = $request['second_note_max'];
        $status->save();

        toast('Estado modificado correctamente!', 'success');
        return back();
    }

}
