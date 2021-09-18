<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AdminMiddleware
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
        $admin = User::where('id', current_user()->id)
            ->first();

        if ($admin->userType == 'Admin') {
            return $next($request);
        } else {
            return redirect('/dashboard');
        }
    }
}
