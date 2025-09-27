<?php

namespace App\Providers;

use App\Buttons;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use App\Providers\CustomUserProvider;  // asegúrate de que la ruta coincida

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Registrar el CustomUserProvider para que el broker use email_school
        Auth::provider('custom', function($app, array $config) {
            return new CustomUserProvider($app['hash'], $config['model']);
        });

        // Override URL for password reset to include email_school
        ResetPassword::createUrlUsing(function ($user, string $token) {
            return url(route('password.reset', [
                'token' => $token,
                'email' => $user->getEmailForPasswordReset(),
            ], false));
        });

        View::composer(
            [
                'auth.login',
                'web.students.listStudent',
                'web.students._agregarNotaModal',
                'web.parts._download',
                'web.download.listDownload'
            ],
            function ($view) {
                $registerSchool      = Buttons::where('id', 2)->first();
                $registerNote        = Buttons::where('id', 5)->first();
                $registerNoteInter   = Buttons::where('id', 8)->first();
                $downloadExam        = Buttons::where('id', 9)->first();
                $downloadCorrection  = Buttons::where('id', 10)->first();
                $downloadCorrection2 = Buttons::where('id', 11)->first();

                $view->with([
                    'registerSchool'      => $registerSchool,
                    'registerNote'        => $registerNote,
                    'registerNoteInter'   => $registerNoteInter,
                    'downloadExam'        => $downloadExam,
                    'downloadCorrection'  => $downloadCorrection,
                    'downloadCorrection2' => $downloadCorrection2,
                ]);
            }
        );
    }
}
