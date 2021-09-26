<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            $table->string('name_teacher');
            $table->string('lastname_teacher');
            $table->string('dni_teacher');
            $table->string('space');
            $table->enum('level_teacher', ['1', '2', '3']);
            $table->enum('other_school', ['SI', 'NO']);
            $table->string('name_school_teacher')->nullable();;
            $table->string('phone_teacher');
            $table->string('email_teacher', 160)->unique();
            $table->enum('first_time_teacher', ['SI', 'NO']);

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
        Schema::dropIfExists('teachers');
    }
}
