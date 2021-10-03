<?php

namespace App\Http\Middleware;

use App\Buttons;
use App\Student;
use Closure;

class RegisterStudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $registerStudent = Buttons::where('id', 4)
            ->first();

        if ($registerStudent->status_button == '0') {
            alert()->error('Oops...', 'Todavía no esta habilitada la inscripción de los alumnos!');
            return back();
        } else {
            return $next($request);
        }
    }
}
