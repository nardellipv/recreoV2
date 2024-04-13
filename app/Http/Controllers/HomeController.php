<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Http\Requests\UserRequest;
use App\Province;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Empty_;

class HomeController extends Controller
{
    public function index()
    {
        $students = Student::where('user_id', current_user()->id)
            ->get();

        $teachers = Teacher::where('user_id', current_user()->id)
            ->get();

        $school = User::where('id', current_user()->id)
            ->first();

        return view('web.index', compact('students', 'teachers', 'school'));
    }

    public function restartPassword(Request $request)
    {
        $user = User::where('email_school', $request['email'])
            ->first();

        if (empty($user)) {
            toast('El mail introducido no esta registrado', 'error');
            return back();
        }

        Mail::send('emails.restart', ['user' => $user], function ($msj) use ($user) {
            $msj->from('no-responder@oacj2024.online', 'Olimpiadas OACj');
            $msj->subject('Reseteo de contraseña');
            $msj->to($user->email_school, $user->name_school);
        });

        return view('auth.login');
    }

    public function changePassword(Request $request)
    {
        $user = User::where('password', $request['password'])
            ->first();

        if (empty($user)) {
            toast('Hubo un problema con el cambio de password y la validación de su cuenta. Comuniquese con un representante de OACj', 'error');
            return view('auth.login');
        }

        return view('auth.changePass', compact('user'));
    }

    public function newPassword(Request $request)
    {
        $userId = last(request()->segments());

        $user = User::where('id', $userId)
            ->first();
        $user->password = Hash::make($request['password']);
        $user->save();

        toast('Se actualizó correctamente su contraseña.', 'success');
        return redirect()->route('login');
    }
}
