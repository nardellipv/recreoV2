<?php

namespace App\Providers;

use App\Buttons;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer('web.parts._menu', function ($view) {

            $registerTeacher = Buttons::where('id', 3)
                ->first();
            $registerStudent = Buttons::where('id', 4)
                ->first();

            $view->with([
                'registerTeacher' => $registerTeacher,
                'registerStudent' => $registerStudent,
            ]);
        });

        view::composer(
            [
                'auth.login',
                'web.students.listStudent',
                'web.students._agregarNotaModal'
            ],
            function ($view) {

                $registerSchool = Buttons::where('id', 2)
                    ->first();
                $registerNote = Buttons::where('id', 5)
                    ->first();

                $view->with([
                    'registerSchool' => $registerSchool,
                    'registerNote' => $registerNote,
                ]);
            }
        );
    }
}
