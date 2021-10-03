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
