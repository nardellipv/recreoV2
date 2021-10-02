<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buttons', function (Blueprint $table) {
            $table->id();

            $table->string('name_button');
            $table->integer('status_button');
            $table->integer('first_note_max')->unsigned();
            $table->integer('second_note_max')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buttons');
    }
}
