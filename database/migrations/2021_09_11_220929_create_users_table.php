<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->string('address');
            $table->integer('postal_code');
            $table->string('phone');
            $table->enum('type', ['PRIVADA', 'PUBLICA']);
            $table->string('director1');
            $table->string('director2');
            $table->string('email', 120)->unique();
            $table->enum('first_time', ['SI', 'NO']);
            $table->enum('sede', ['SI', 'NO'])->default('NO');

            //relaciones

            $table->foreignId('province_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('region_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
