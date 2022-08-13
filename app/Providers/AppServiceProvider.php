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
                'web.students._agregarNotaModal',
                'web.parts._download',
                'web.download.listDownload'
            ],
            function ($view) {

                $registerSchool = Buttons::where('id', 2)
                    ->first();
                $registerNote = Buttons::where('id', 5)
                    ->first();
                $registerNoteInter = Buttons::where('id', 8)
                    ->first();

                $downloadExam = Buttons::where('id', 9)
                    ->first();

                $downloadCorrection = Buttons::where('id', 10)
                    ->first();

                $view->with([
                    'registerSchool' => $registerSchool,
                    'registerNote' => $registerNote,
                    'registerNoteInter' => $registerNoteInter,
                    'downloadExam' => $downloadExam,
                    'downloadCorrection' => $downloadCorrection,
                ]);
            }
        );
    }
}
