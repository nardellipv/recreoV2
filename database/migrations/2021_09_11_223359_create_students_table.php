<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('name_student');
            $table->string('lastname_student');
            $table->string('dni_student')->unique();
            $table->date('birth_date');
            $table->string('genre');
            $table->string('phone_student')->unique();
            $table->string('email_student')->unique();
            $table->string('classroom');
            $table->enum('level_student', ['1', '2']);
            $table->string('first_note')->nullable();
            $table->string('second_note')->nullable();
            $table->string('total_note')->nullable();
            $table->string('first_note_inter')->nullable();
            $table->string('second_note_inter')->nullable();
            $table->string('total_note_inter')->nullable();
            $table->enum('first_time_student', ['SI', 'NO']);

            //relaciones

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
