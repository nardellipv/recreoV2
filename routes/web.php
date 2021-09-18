<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    return 'FINISHED';
});

Auth::routes();

//Admin Colegio
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::get('/colegio/{id}', 'HomeController@editSchool')->name('school.edit');
    Route::post('/colegio/update/{id}', 'HomeController@updateSchool')->name('school.update');

    Route::get('/profesor/listado', 'TeacherController@listTeacher')->name('teacher.list');
    Route::post('/profesor/alta-profesor', 'TeacherController@storeTeacher')->name('teacher.store');
    Route::view('/profesor/agregar', 'web.teachers.addTeacher')->name('teacher.add');
    Route::get('/profesor/editar/{id}', 'TeacherController@editTeacher')->name('teacher.edit');
    Route::post('/profesor/update/{id}', 'TeacherController@updateTeacher')->name('teacher.update');
    Route::get('/profesor/eliminar/{id}', 'TeacherController@deleteTeacher')->name('teacher.delete');

    Route::middleware(['StudentMiddleware'])->group(function () {
        Route::get('/alumno/listado', 'StudentController@listStudent')->name('student.list');
        Route::post('/alumno/alta-alumno', 'StudentController@storeStudent')->name('student.store');
        Route::view('/alumno/agregar', 'web.students.addStudent')->name('student.add');
        Route::get('/alumno/editar/{id}', 'StudentController@editStudent')->name('student.edit');
        Route::post('/alumno/update/{id}', 'StudentController@updateStudent')->name('student.update');
        Route::get('/alumno/eliminar/{id}', 'StudentController@deleteStudent')->name('student.delete');
    });
});
