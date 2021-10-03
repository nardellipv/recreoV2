<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('route:clear');
    \Artisan::call('view:clear');
    return 'FINISHED';
});

Auth::routes();

//Admin Colegio
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::get('/colegio/{id}', 'SchoolController@editSchool')->name('school.edit');
    Route::post('/colegio/update/{id}', 'SchoolController@updateSchool')->name('school.update');

    Route::get('/profesor/listado', 'TeacherController@listTeacher')->name('teacher.list');
    Route::view('/profesor/agregar', 'web.teachers.addTeacher')->name('teacher.add')->middleware('RegisterTeacherMiddleware');
    Route::post('/profesor/alta-profesor', 'TeacherController@storeTeacher')->name('teacher.store');
    Route::get('/profesor/editar/{id}', 'TeacherController@editTeacher')->name('teacher.edit');
    Route::post('/profesor/update/{id}', 'TeacherController@updateTeacher')->name('teacher.update');
    Route::get('/profesor/eliminar/{id}', 'TeacherController@deleteTeacher')->name('teacher.delete');

    Route::get('/alumno/listado', 'StudentController@listStudent')->name('student.list');
    Route::post('/alumno/alta-alumno', 'StudentController@storeStudent')->name('student.store');
    Route::view('/alumno/agregar', 'web.students.addStudent')->name('student.add')->middleware(['StudentMiddleware', 'RegisterStudentMiddleware']);
    Route::get('/alumno/editar/{id}', 'StudentController@editStudent')->name('student.edit');
    Route::post('/alumno/update/{id}', 'StudentController@updateStudent')->name('student.update');
    Route::get('/alumno/eliminar/{id}', 'StudentController@deleteStudent')->name('student.delete');
    Route::post('/alumno/agregar-nota/{id}', 'StudentController@addNoteStudent')->name('student.addNote');
});

Route::middleware(['auth', 'AdminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', 'Admin\HomeAdminController@index')->name('admin.dashboard');

    Route::post('/admin/estados/editar/{id}', 'Admin\HomeAdminController@editStatus')->name('admin.editStatus');

    Route::get('users/export/nivel1', 'Admin\StudentAdminController@exportStudentLevel1')->name('admin.exportStudentLevel1');
    Route::get('users/export/nivel2', 'Admin\StudentAdminController@exportStudentLevel2')->name('admin.exportStudentLevel2');

    Route::get('users/export/colegio', 'Admin\SchoolAdminController@exportSchoolLevelStudent')->name('admin.exportSchoolLevelStudent');

    Route::get('users/export/profesores', 'Admin\TeacherAdminController@exportTeacherSchoolLevel')->name('admin.exportTeacherSchoolLevel');
    
    Route::get('users/export/profesores_alumnos', 'Admin\TeacherAdminController@exportTeacherStudent')->name('admin.exportTeacherStudent');

    Route::get('/admin/profesor/listado', 'Admin\TeacherAdminController@adminListTeacher')->name('admin.teacher');
    Route::get('/admin/profesor/editar/{id}', 'Admin\TeacherAdminController@adminEditTeacher')->name('admin.teacherEdit');
    Route::post('/admin/profesor/update/{id}', 'Admin\TeacherAdminController@adminUpdateTeacher')->name('admin.teacherUpdate');

    Route::get('/admin/alumno/listado', 'Admin\StudentAdminController@adminListStudent')->name('admin.student');
    Route::get('/admin/alumno/editar/{id}', 'Admin\StudentAdminController@adminEditStudent')->name('admin.studentEdit');
    Route::post('/admin/alumno/update/{id}', 'Admin\StudentAdminController@adminUpdateStudent')->name('admin.studentUpdate');

    Route::get('/admin/escuela/listado', 'Admin\SchoolAdminController@adminListSchool')->name('admin.school');
    Route::get('/admin/escuela/editar/{id}', 'Admin\SchoolAdminController@adminEditSchool')->name('admin.schoolEdit');
    Route::post('/admin/escuela/update/{id}', 'Admin\SchoolAdminController@adminUpdateSchool')->name('admin.schoolUpdate');
});
