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

            $table->string('name');
            $table->string('lastname');
            $table->string('dni');
            $table->date('birth_date');
            $table->string('genre');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('classroom');
            $table->enum('level', ['1', '2']);
            $table->string('first_note')->nullable();
            $table->string('second_note')->nullable();
            $table->string('total_note')->nullable();
            $table->enum('first_time', ['SI', 'NO']);

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
