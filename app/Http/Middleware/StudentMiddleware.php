<?php

namespace App\Http\Middleware;

use App\Teacher;
use Closure;

class StudentMiddleware
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
        $teacher = Teacher::where('user_id', current_user()->id)
            ->get();
        
        if ($teacher->isEmpty()) {
            alert()->error('Oops...','Antes de agregar alumnos debe al menos agregar un profesor!');
            return back();
        } else {
            return $next($request);
        }
    }
}
